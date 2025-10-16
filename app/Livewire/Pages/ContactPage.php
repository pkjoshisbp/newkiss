<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class ContactPage extends Component
{
    public $firstName = '';
    public $lastName = '';
    public $email = '';
    public $phone = '';
    public $childAge = '';
    public $location = '';
    public $programs = [];
    public $message = '';
    
    // Bot protection fields
    public $website = ''; // Honeypot field (should remain empty)
    public $captcha_answer = '';
    public $captcha_num1;
    public $captcha_num2;
    
    protected $rules = [
        'firstName' => 'required|string|max:100',
        'lastName' => 'required|string|max:100',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'childAge' => 'nullable|string',
        'location' => 'nullable|string',
        'programs' => 'nullable|array',
        'message' => 'required|string|max:2000',
        'website' => 'size:0', // Honeypot must be empty
        'captcha_answer' => 'required|integer',
    ];

    public function mount()
    {
        // Generate random numbers for captcha
        $this->captcha_num1 = rand(1, 10);
        $this->captcha_num2 = rand(1, 10);
    }

    public function submit()
    {
        // Validate honeypot
        if (!empty($this->website)) {
            session()->flash('error', 'Spam detected. Your submission was blocked.');
            return;
        }

        // Validate captcha
        $correctAnswer = $this->captcha_num1 + $this->captcha_num2;
        if ((int)$this->captcha_answer !== $correctAnswer) {
            session()->flash('error', 'Incorrect answer to the math question. Please try again.');
            // Regenerate captcha
            $this->captcha_num1 = rand(1, 10);
            $this->captcha_num2 = rand(1, 10);
            $this->captcha_answer = '';
            return;
        }

        $this->validate();

        // Send email notification
        try {
            $data = [
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'email' => $this->email,
                'phone' => $this->phone,
                'childAge' => $this->childAge,
                'location' => $this->location,
                'programs' => $this->programs,
                'message' => $this->message,
            ];

            // You can configure the email recipient in .env
            $recipientEmail = config('mail.contact_recipient', 'kiss.swim@gmail.com');
            
            Mail::send('emails.contact', $data, function($message) use ($data) {
                $message->to(config('mail.contact_recipient', 'kiss.swim@gmail.com'))
                        ->subject('New Contact Form Submission - KISS Aquatics')
                        ->replyTo($data['email'], $data['firstName'] . ' ' . $data['lastName']);
            });

            session()->flash('success', 'Thank you for contacting us! We will get back to you soon.');
            $this->reset(['firstName', 'lastName', 'email', 'phone', 'childAge', 'location', 'programs', 'message', 'captcha_answer']);
            
            // Regenerate captcha
            $this->captcha_num1 = rand(1, 10);
            $this->captcha_num2 = rand(1, 10);
            
        } catch (\Exception $e) {
            session()->flash('error', 'There was an error sending your message. Please try again or call us directly.');
        }
    }

    public function render()
    {
        return view('livewire.pages.contact-page')
            ->layout('layouts.app', [
                'title' => 'Contact Us - K.I.S.S. Aquatics',
                'description' => 'Get in touch with K.I.S.S. Aquatics for questions about locations, pricing, or scheduling swim lessons.',
            ]);
    }
}
