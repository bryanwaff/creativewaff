<?php

use App\Mail\ContactInquiryReceived;
use App\Models\ContactInquiry;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

// Homepage
Route::get('/', function () {
    $featuredServices = Service::where('is_featured', true)->orderBy('id')->get();

    return view('home', compact('featuredServices'));
})->name('home');

// About Me / Creative Waff
Route::get('/about', function () {
    $projects = Project::where('is_featured', true)->orderBy('id')->take(3)->get();

    return view('about', compact('projects'));
})->name('about');

// Services Catalog List Page
Route::get('/services', function () {
    $services = Service::orderBy('id')->get();

    return view('services.index', compact('services'));
})->name('services.index');

// Individual Service Page (Meta Catalog Target)
Route::get('/services/{service:slug}', function (Service $service) {
    return view('services.show', compact('service'));
})->name('services.show');

// Projects Portfolio Index & Show
Route::get('/projects', function () {
    return view('projects.index');
})->name('projects.index');

Route::get('/projects/{project:slug}', function (Project $project) {
    $relatedProjects = Project::query()
        ->whereKeyNot($project->id)
        ->orderByRaw('CASE WHEN category = ? THEN 0 ELSE 1 END', [$project->category])
        ->latest()
        ->take(3)
        ->get();

    return view('projects.show', compact('project', 'relatedProjects'));
})->name('projects.show');

// Contact Page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', function (Request $request) {
    $inquiry = $request->validate([
        'full_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'project_type' => ['required', 'in:web_app_development,live_event_production,motion_design_branding,consulting'],
        'timeline_budget' => ['nullable', 'string', 'max:255'],
        'message' => ['required', 'string', 'max:5000'],
    ]);

    $contactInquiry = ContactInquiry::create($inquiry);
    $notificationSent = true;

    try {
        Mail::to(config('contact.inquiry_recipients'))
            ->send(new ContactInquiryReceived($contactInquiry));
    } catch (TransportExceptionInterface $exception) {
        $notificationSent = false;
        Log::error('Contact inquiry email notification failed.', [
            'inquiry_id' => $contactInquiry->id,
            'exception' => $exception,
        ]);
    }

    $projectType = match ($contactInquiry->project_type) {
        'web_app_development' => 'Web/App Development',
        'live_event_production' => 'Live Event Production',
        'motion_design_branding' => 'Motion Design & Branding',
        'consulting' => 'Consulting',
    };

    $whatsappMessage = implode("\n", array_filter([
        'Hi Bryan! I just submitted a project inquiry through the Creative Waff website.',
        "Name: {$contactInquiry->full_name}",
        "Email: {$contactInquiry->email}",
        "Project type: {$projectType}",
        $contactInquiry->timeline_budget ? "Timeline & budget: {$contactInquiry->timeline_budget}" : null,
        "Project details: {$contactInquiry->message}",
        "Inquiry reference: #{$contactInquiry->id}",
    ]));

    $whatsappPhone = preg_replace('/\D+/', '', (string) config('services.whatsapp.phone_number'));
    $whatsappUrl = 'https://wa.me/'.$whatsappPhone.'?'.http_build_query(
        ['text' => $whatsappMessage],
        '',
        '&',
        PHP_QUERY_RFC3986,
    );

    return to_route('contact')
        ->with('status', $notificationSent
            ? 'Thanks for reaching out. Your inquiry was saved and emailed to Creative Waff.'
            : 'Your inquiry was saved, but its email notification could not be delivered.')
        ->with('notification_failed', ! $notificationSent)
        ->with('whatsapp_url', $whatsappUrl);
})->name('contact.store');
