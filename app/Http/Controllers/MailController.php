<?php

namespace App\Http\Controllers;

use App\Mail\MailSender;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function submitForm(Request $request)
    {
        // $mailData = [
        //     'title' => 'Mail from Marocareer.com',
        //     'body' => 'This is for testing email using smtp.'
        // ];

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $mailData = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'message' => $validatedData['message'],
        ];

         
        Mail::to('said.hammane1@gmail.com')->send(new MailSender($mailData));
           
        return view('callCenter.thankyou');
        // return back()->with('success', 'Message sent successfully.');
    }
}