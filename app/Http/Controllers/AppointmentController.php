<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Appointment;
use App\Models\ConseillerJeune;

class AppointmentController extends Controller
{
    public function index()
{
    $conseiller = auth()->user();
    $jeunes = $conseiller->jeunes;

    return view('conseiller.appointments.index', compact('jeunes'));
}

public function create($jeuneId)
{
    $jeune = User::findOrFail($jeuneId);

    return view('conseiller.appointments.create', compact('jeune'));
}

public function store(Request $request)
{
    // Validation des données du formulaire
    $request->validate([
        'date' => 'required|date',
        'heure' => 'required|date_format:H:i',
        'description' => 'nullable|string',
    ]);

    // Récupérer l'utilisateur connecté (conseiller)
    $conseiller = auth()->user();

    // Création du rendez-vous
    $appointment = new Appointment();
    $appointment->conseiller_id = $conseiller->id;
    $appointment->jeune_id = $request->input('jeune_id'); // Assurez-vous que vous avez un champ 'jeune_id' dans le formulaire
    $appointment->date = $request->input('date');
    $appointment->heure = $request->input('heure');
    $appointment->description = $request->input('description');
    $appointment->save();

    // Redirection avec un message de succès
    return redirect()->route('conseiller.jeune')->with('success', 'Rendez-vous créé avec succès.');
}


public function calendar()
{
    $conseiller = auth()->user();
    $appointments = $conseiller->appointments()->with('conseiller', 'jeune.information')->get();

    $currentMonth = now();
    $firstDayOfMonth = $currentMonth->startOfMonth()->dayOfWeekIso;
    $daysInMonth = $currentMonth->daysInMonth;

    // Générer un tableau des jours du mois avec les rendez-vous associés
    $calendar = [];
    $currentDay = 1;

    for ($week = 1; $week <= 6; $week++) {
        for ($dayOfWeek = 1; $dayOfWeek <= 7; $dayOfWeek++) {
            if ($week === 1 && $dayOfWeek < $firstDayOfMonth) {
                // Jour vide avant le premier jour du mois
                $calendar[$week][$dayOfWeek] = null;
            } elseif ($currentDay > $daysInMonth) {
                // Jour vide après le dernier jour du mois
                $calendar[$week][$dayOfWeek] = null;
            } else {
                // Jour du mois avec les rendez-vous associés
                $date = Carbon::createFromDate(
                    $currentMonth->year,
                    $currentMonth->month,
                    $currentDay
                )->startOfDay();

                // Filtrer les rendez-vous pour la date actuelle
                $dailyAppointments = $appointments->filter(function ($appointment) use ($date) {
                    $appointmentDate = is_string($appointment->date) ? Carbon::parse($appointment->date) : $appointment->date;
                    return $appointmentDate->startOfDay()->isSameDay($date);
                });

                $calendar[$week][$dayOfWeek] = [
                    'day' => $currentDay,
                    'appointments' => $dailyAppointments->map(function ($appointment) {
                        return [
                            'heure' => $appointment->heure,
                            'date' => Carbon::parse($appointment->date)->format('Y-m-d'), // Formatage de la date
                            // Autres champs d'information nécessaires
                        ];
                    }),
                ];

                $currentDay++;
            }
        }
    }

    return view('conseiller.appointments.calendar', compact('calendar', 'currentMonth', 'appointments'));
}


}
