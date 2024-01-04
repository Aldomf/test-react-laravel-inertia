<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CandidatureNotification extends Notification
{
    use Queueable;

    protected $jeune;
    protected $offre;

    public function __construct($jeune, $offre)
    {
        $this->jeune = $jeune;
        $this->offre = $offre;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'jeune_id' => $this->jeune->id,
            'offre_id' => $this->offre->id,
            // D'autres informations nécessaires pour la notification
        ];
    }
}