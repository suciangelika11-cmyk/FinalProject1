<?php

namespace App\Mail;

use App\Models\Jemaat;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JemaatConfirmedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $jemaat;

    public function __construct(Jemaat $jemaat)
    {
        $this->jemaat = $jemaat;
    }

    public function build()
    {
        return $this
            ->subject('Shalom! Pendaftaran Jemaat Anda Berhasil Dikonfirmasi')
            ->view('emails.jemaat-confirmed');
    }
}