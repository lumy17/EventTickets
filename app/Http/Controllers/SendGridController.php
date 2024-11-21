<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class SendGridController extends Controller
{
    public function sendInvitations($id)
    {
        $event = Event::find($id);
        $users = User::where('tip', 'user')->get();

        foreach ($users as $user) {
            $this->sendInvitationWithSendGrid($user->email, $event);
        }
        if (session()->has('success')) {
            print('email sent');
        }
        return redirect()->back()->with('success', 'Invitations have been sent successfully!');
    }
    public function sendInvitationWithSendGrid($recipient, $event)
    {
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("moldovanlumi0@gmail.com", "Moldovan");
        $email->setSubject("Invitatie cumparare bilet: " . $event->titlu);
        $email->addTo($recipient, "nume destinatar");
        $email->addContent(
            "text/plain",
            "Bună ziua,\n\nSuntem încântați să vă invităm la evenimentul nostru:\n
Pentru a cumpara bilete va rugam sa accesati pagina: localhost:8000/home\n\n" .
            "Titlu: " . $event->titlu . "\n" .
            "Data si ora: " . $event->data . "\n"
            // Add other details about the event
        );

        $sendgrid = new \SendGrid('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');

        try {
            $response = $sendgrid->send($email);
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
            Log::error('SendGrid exception: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Invitations could not be sent. Please try again later.');
        }
    }
}
