<?php

namespace App\Mail;

use App\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewsletter extends Mailable
{
    use Queueable, SerializesModels;
    public $subscriber, $name, $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Subscriber $subscriber, $name, $post)
    {
        $this->subscriber = $subscriber;
        $this->name = $name;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        return $this->from('og@emailplatform.com')
            ->view('newsletter', ['name' => $request->name, 'post' => $request->post])
            ->to($this->subscriber->email)
            ->subject( $request->name );
    }
}
