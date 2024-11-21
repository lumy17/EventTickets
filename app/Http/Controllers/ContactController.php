<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
    
        // Code to handle the data, like sending an email or storing in the database
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("moldovanlumi0@gmail.com", "Moldovan");
        $email->setSubject("New Contact Form Submission");
        $email->addTo('moldovanlumi0@gmail.com');
        $email->addContent(
            "text/plain",
            "Email: {$data['email']}\nName: {$data['name']}\nMessage: {$data['message']}"
        );
    
        $sendgrid = new \SendGrid('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');
    
        try {
            $response = $sendgrid->send($email);
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
            return redirect()->back()->with('error', 'Message could not be sent. Please try again later.');
        }
    
        return redirect('contact')->with('success', 'Thank you for your message.');
    }
    
}
