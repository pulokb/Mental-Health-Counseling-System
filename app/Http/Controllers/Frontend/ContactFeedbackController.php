<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFeedbackController extends Controller
{
    // Display contact page
    public function contact()
    {
        return view('frontend.contact');
    }

    // Display feedback page (if separate)
    public function feedback()
    {
        return view('frontend.feedback');
    }

    // Submit feedback
    public function submitFeedback(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'message' => 'required|string',
        ]);

        // Save feedback into the database
        $feedback = new ContactFeedback();
        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->subject = $request->subject;
        $feedback->phone = $request->phone;
        $feedback->message = $request->message;
        $feedback->save();

        // Send email notification to admin
        $emailData = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
        ];

        Mail::send('emails.feedback', $emailData, function ($message) use ($emailData) {
            $message->to('pulok.contact@gmail.com')
                    ->subject($emailData['subject'])
                    ->from($emailData['email'], $emailData['name']);
        });



        // Redirect back with success message
        return back()->with('success', 'Thank you for contacting us. We will get back to you soon.');
    }
}
