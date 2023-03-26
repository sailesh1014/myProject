<?php
declare(strict_types = 1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ArtistInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public $event, public $user)
    {
    }


    public function envelope() : Envelope
    {
         $club = $this->event->club;
        return new Envelope(
             from: new Address($club->user->email, ucwords($club->name)),
             replyTo: [
                  new Address($club->user->email, ucwords($club->user->first_name." ".$club->user->last_name)),
             ],
             subject: "Invitation From ".config('app.name'),
        );
    }

    public function content() : Content
    {
        return new Content(
            view: 'mails.artist-invitation',
        );
    }

}
