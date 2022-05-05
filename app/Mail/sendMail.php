<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;

    protected $department;

    protected $phone;

    protected $mail;

    protected $title;

    protected $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        ?string $department,
        string $phone,
        string $mail,
        string $title,
        string $content
    ) {
        $this->name = $name;
        $this->department = $department;
        $this->phone = $phone;
        $this->mail = $mail;
        $this->title = $title;
        $this->content = $content;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.sendMail')
            ->subject("[系統] 聯絡我們 - $this->title")
            ->with([
                'name' => $this->name,
                'department' => $this->department,
                'phone' => $this->phone,
                'mail' => $this->mail,
                'content' => $this->content,
            ]);
    }
}
