<?php

namespace App\Http\Controllers;

use App\Mail\MailSender;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Mail from Marocareer.com',
            'body' => 'This is for testing email using smtp.'
        ];
         
        Mail::to('said.hammane1@gmail.com')->send(new MailSender($mailData));
           
        dd("Email is sent successfully.");
    }
}
