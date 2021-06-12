<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 

use App\Models\Feedback; 
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function getFeedback() { 

       return view('feedback'); 

    }
    public function savefeedback(Request $request) { 
    	$regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        $this->validate($request, [
            'name' => 'required|',
            'email' => 'required|email',
            'url' => 'nullable|regex:'.$regex,
            'message' => 'required'
        ]);

        $feedback = new Feedback;

        $feedback->name = $request->name;
        $feedback->email = $request->email;
        $feedback->url = $request->url;
        $feedback->message = $request->message;

        $feedback->save();
        
        Mail::send('feedback_email',
             array(
                 'name' => $request->get('name'),
                 'email' => $request->get('email'),
                 'url' => $request->get('url'),
                 'user_message' => $request->get('message'),
             ), function($message) use ($request)
               {
                  $message->from($request->email);
                  $message->to('mariselvan3@gmail.com');
                  $message->subject('Feedback');
               });
        return back()->with('success', 'Thank you for your Feedback!');

    }
}
