<?php

namespace App\Http\Controllers;

use App\Mail\NewUserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendmailController extends Controller
{
    public function sendEmail() {

        $to_email = "nguyenxuanhoang2000@gmail.com";

        Mail::to($to_email)->send(new NewUserNotification);

        return "<p> Thành công! Email của bạn đã được gửi</p>";

    }
}
