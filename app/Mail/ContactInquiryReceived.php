<?php

namespace App\Mail;

use App\Models\ContactInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactInquiryReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactInquiry $inquiry) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "New project inquiry: {$this->inquiry->full_name}",
            replyTo: [new Address($this->inquiry->email, $this->inquiry->full_name)],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-inquiry',
            with: ['projectTypeLabel' => $this->projectTypeLabel()],
        );
    }

    public function projectTypeLabel(): string
    {
        return match ($this->inquiry->project_type) {
            'web_app_development' => 'Web/App Development',
            'live_event_production' => 'Live Event Production',
            'motion_design_branding' => 'Motion Design & Branding',
            'consulting' => 'Consulting',
        };
    }
}
