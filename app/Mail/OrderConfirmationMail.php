<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $orderDetails;

    /**
     * Create a new message instance.
     */
    public function __construct($orderDetails)
    {
        $this->orderDetails = $orderDetails;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this
            ->from('orders@getseolinks.com', 'GetSEOLinks')
            ->subject('GetSEOLinks Order Confirmation')
            ->view('emails.order_confirmation')
            ->with('orderDetails', $this->orderDetails);
    }
}
