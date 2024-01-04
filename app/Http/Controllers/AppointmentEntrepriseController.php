<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\User;
use App\Models\AppointmentEntreprise;
use App\Models\BusinessManagerEntreprise;

class AppointmentEntrepriseController extends Controller
{
    public function index()
    {
        $business = auth()->user();
        $entreprises = $business->entreprises;
        
        return view('businessManager.appointments.index',compact('entreprises'));
    }

    public function create($entrepriseId)
    {
        $entreprise = User::findorFail($entrepriseId);

        return view('businessManager.appointments.create',compact('entreprise'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'heure' => 'required|date_format:H:i',
            'description' => 'nullable|string',
        ]);

        $business = auth()->user();

        $appointment = new AppointmentEntreprise();
        $appointment->business_id = $business->id;
        $appointment->entreprise_id = $request->input('entreprise_id');
        $appointment->date = $request->input('date');
        $appointment->heure = $request->input('heure');
        $appointment->description = $request->input('description');
        $appointment->save();

        return redirect()->route('businessManager.entreprise')->with('success', 'Rendez-vous créé avec succès.');
    }

    
public function calendar()
{
    $business = auth()->user();
    $appointments = $business->appointmentsEntreprise()->with('business', 'entreprise.information')->get();

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

    return view('businessManager.appointments.calendar', compact('calendar', 'currentMonth', 'appointments'));
}

}
