<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Invoicesmail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public function __construct($order)
    {
        $this->order=$order;
        //
    }


    public function build()
    {
        $subject="Your Invoices From Factor Thank you";
        return $this->subject($subject)
              ->view('Backend.Order.show_invoices');
    }
}
