<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;
class SendMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$Request)
    {
        $this->name = $name;
        $this->subject = 'Thư mời họp';
        $this->formdata = $Request;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        return $this->view('Mail.Thumoi')->with([
                        'name' => $this->formdata->name,
                        'tenhop' => $this->formdata->event_name,
                        'startdate' => $this->formdata->start_date,
                            'enddate' => $this->formdata->end_date,
                            'noidung'=>$this->formdata->noidung,
                            'diadiem'=>$this->formdata->diadiem,
                        ]);
    }
}