<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Lang;
use App\Models\User;

class ConfirmationSend extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = action('ConfirmationController@confirm', ['name' => $this->user->name, 'key' => $this->user->confirmation->key]);

        return $this->markdown('emails/confirmation')
                    ->subject(Lang::get('app.confirmation_mail.subject'))
                    ->with([
                        'url' => $url,
                        'name' => $this->user->name,
                    ]);
    }
}
