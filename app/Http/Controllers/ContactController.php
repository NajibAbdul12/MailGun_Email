<?php 

namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use App\Models\Contact;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

use Mail; 
use Validator;

class ContactController extends Controller { 

      public function getContact() { 

       return view('contact_us'); 
      } 


     public function saveContact(Request $request) { 
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:140'
        ]);

        $contacts = new Contact;

        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->message = $request->message;

        $contacts->save();

        \Mail::send('contact_email',
             array(
                 'name' => $request->get('name'),
                 'email' => $request->get('email'),
                 'user_message' => $request->get('message'),
             ), function($message) use ($request)
               {
                  $message->from($request->email);
                  $message->to('najibabdulkhadir@hotmail.com');
               });

          return back()->with('success', 'Thank you for contact us!');

          \Redis::throttle('key')->allow(1)->every(15)->then(function () {
            // Lock obtained, process the email...
        }, function () {
            // Unable to obtain lock...
            return $this->release(1);
        });
    }

    

 
}