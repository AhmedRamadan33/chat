<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $appointment;
    public function __construct($name,$appointment)
    {

        $this->name=$name;
        $this->appointment=$appointment;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Appointment Mail',
        );
    }

    // public function content()
    // {
    //     return new Content(
    //         view: 'mail.appointment',
    //     );
    // }

    public function build()
    {
        return $this->view('mail.appointment')->subject('تاكيد موعد');
    }

    public function attachments()
    {
        return [];
    }
}
