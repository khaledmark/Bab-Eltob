<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReplyMessage;

class ContactUsController extends Controller
{

    public function index() {

        $data = Contact::get();

        return view('admin.contact_us.index', compact('data'));
    }

    public function show(Contact $contactU) {

        return view('admin.contact_us.show', compact('contactU'));
    }

    public function replyMessage(Request $request) {

        $headingTitle = 'Reply Message From Admin To Your Message';
//        $return = $this->sendEmail($request->receiver_email, $request->msg_body, $headingTitle);
        $data = Contact::find($request->id);
        $updated = $data->update(['reply' => $request->msg_body]);

        $this->sendEmail($request->receiver_email, $request->msg_body, $headingTitle, $data->message);

        return  json_encode(['code' => $updated]);
    }

    public function destroy(Request $request){

        $deleted = Contact::where('id', $request->id)->delete();
        $url = route('contactUs.index');

        return $deleted
            ? json_encode(['code' => $deleted, 'url' => $url])
            : json_encode(['code' => $deleted, 'message' => 'نأسف لحدوث هذا الخطأ, برجاء المحاولة لاحقًا']);
    }

    protected function sendEmail($userEmail, $messageReply, $headingTitle, $userMessage) {

        $data = [
            'mailSubject'   => 'Contact Us Reply Message',
            'contactReply'  => $messageReply,
            'headingTitle'  => $headingTitle,
            'messagesTitle' => settings()['name'],
            'userMessage'  => $userMessage
        ];

        Mail::to($userEmail)->send(new ReplyMessage($data));

        if( count(Mail::failures()) > 0 ) {
            Mail::to($userEmail)->send(new ReplyMessage($data));

            if( count(Mail::failures()) > 0 ) {
                Mail::to($userEmail)->send(new ReplyMessage($data));
            }
        }

//        if($mailable->hasSent())
//            return true;
//        return false;
    }
}
