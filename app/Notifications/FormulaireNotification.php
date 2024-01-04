<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FormulaireNotification extends Notification
{
    use Queueable;

    protected $jeune;
    protected $choix;

    public function __construct($jeune, $choix)
    {
        $this->jeune = $jeune;
        $this->choix = $choix;
    }

    public function via($notifiable)
    {
        return ['database']; // Choisissez le canal de notification approprié
    }

    public function toArray($notifiable)
    {
        return [
            'jeune_id' => $this->jeune->id,
            'choix' => $this->choix,
            // Autres détails pour la notification
        ];
    }
}
