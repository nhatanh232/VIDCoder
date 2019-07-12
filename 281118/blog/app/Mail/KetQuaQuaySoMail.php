<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class KetQuaQuaySoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($req)
    {
        $this->subject = 'Kết Quả Quay Số';
        $this->formdata = $req;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mail.KetQuaQuaySo')->from('dautuviendong@gmail.com','Cơ Sở Vật Chất')->with([
            'data'=> $this->formdata,
        ]);
    }
}
