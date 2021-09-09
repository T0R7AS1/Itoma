<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Company;

class CompanyCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->name=$data['name'];
        $this->email=$data['email'];
        $this->website=$data['website'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.companieCreated')->subject('No-reply')->with([
            'name' => $this->name,
            'email' => $this->email,
            'website' => $this->website,
        ]);
    }
}
