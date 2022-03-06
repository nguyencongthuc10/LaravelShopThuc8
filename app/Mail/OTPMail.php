<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OTPMail extends Mailable
{
    use Queueable, SerializesModels;
    public $OTP;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($OTP)
    {
        $this->OTP = $OTP;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('otpmaillravelthuc@gmail.com','OTP ShopThuc')
        ->view('mail.OTPMailCusTom')
        ->text('mail.OTPMailCustom_plain')
        ->subject('Xác nhận OTP')
        
        ->with(
          [
                'testVarOne' => '1',
                'testVarTwo' => '2',
          ]);
          
    }
}
