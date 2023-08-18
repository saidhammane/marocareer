<?php

namespace App\Http\Controllers;

use App\Mail\MailSender;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function sendMail(){
        $name = 'metestmail';
        Mail::to('said.hammane1@gmail.com')->send(new MailSender($name));
        return view('mail.sendMail');
    }
}
