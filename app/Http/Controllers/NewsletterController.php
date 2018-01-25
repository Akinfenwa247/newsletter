<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendRequest;
use App\Jobs\SendNewsletterJob;
use App\Mail\SendNewsletter;
use App\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function send(SendRequest $request)
    {
        $subscribers = Subscriber::all();

        //sending mail to each of the emails in the database
        foreach ($subscribers as $subscriber) {
            Mail::queue( new SendNewsletter($subscriber, $request->name, $request->post));
        }
        return back()->with([
            'success' => "Campaign Sent!"
        ]);
    }
}
