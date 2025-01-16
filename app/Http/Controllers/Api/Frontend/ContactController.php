<?php
namespace App\Http\Controllers\Api\Frontend;

use App\Helpers\Helper;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller{

    public function messageSend(Request $request){
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        return Helper::jsonResponse(true, 'Message sent successfully', 200);
    }
}