<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Responsable;
use App\Quota;
use App\Employee;

class ContratoApago extends Mailable
{
    use Queueable, SerializesModels;

    public $responsable;
    public $quota;
    public $employee;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Responsable $responsable,Quota $quota,Employee $employee)
    {
        $this->responsable=$responsable;
        $this->quota=$quota;
        $this->employee=$employee;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.toPay')
        ->subject('Pago Disponible');
    }
}
