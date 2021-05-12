<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirm extends Mailable
{
    use Queueable, SerializesModels;
     public $details;
     public $order_lines;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details,$order_lines)
    {
        $this->details=$details;
        $this->order_lines=$order_lines;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Track your order')->view('mail.order_confirm');
    }
}
