<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Mail\SentMsgMail;

class SendMsgController extends Controller
{
    public function sendEmail()
    {
        $data = [
            'name' => 'John Doe',
            'message' => 'This is a test email from Laravel.'
        ];
        Mail::to('yasersemsam@gmail.com')->send(new SentMsgMail($data));
        return response()->json(['message' => 'Email sent successfully!']);
    }
}
