<?php

namespace Tests\Feature;

use App\Mail\ContactInquiryReceived;
use App\Models\ContactInquiry;
use App\Models\Project;
use App\Models\Service;
use Database\Seeders\CreativeWaffSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_catalog_and_about_pages_show_seeded_content(): void
    {
        $this->seed(CreativeWaffSeeder::class);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('Engineered for Performance. Designed for Engagement.')
            ->assertSee('Full-Stack Web & App Development');

        $this->get(route('about'))
            ->assertOk()
            ->assertSee('Bryan Wafula')
            ->assertSee('UNFPA Kenya Campaign');

        $this->get(route('services.index'))
            ->assertOk()
            ->assertSee('Creative Waff Catalog')
            ->assertSee('Kshs.')
            ->assertSee('85,000.00');

        $service = Service::where('slug', 'web-app-development')->firstOrFail();
        $this->get(route('services.show', $service->slug))
            ->assertOk()
            ->assertSee('CW-WEB-001')
            ->assertSee('Domain registration, SSL setup, and deployment');

        $project = Project::where('slug', 'unfpa-kenya-choose-peace-be-peace')->firstOrFail();
        $this->get(route('projects.show', $project->slug))
            ->assertOk()
            ->assertSee('Choose Peace Be Peace')
            ->assertSee('Related Projects')
            ->assertSee('Water Resources Authority Strategic Plan Launch');
    }

    public function test_contact_inquiry_is_validated_and_saved(): void
    {
        Mail::fake();

        $this->get(route('contact'))->assertOk()->assertSee('Estimated Timeline & Budget', false);

        $this->post(route('contact.store'), [
            'full_name' => 'Jordan Example',
            'email' => 'jordan@example.com',
            'project_type' => 'web_app_development',
            'timeline_budget' => '6 weeks, Kshs. 100,000',
            'message' => 'I need a custom web platform.',
        ])->assertRedirect(route('contact'))
            ->assertSessionHas('whatsapp_url', fn (string $url) => str_contains(urldecode($url), 'I need a custom web platform.'));

        $this->assertDatabaseHas('contact_inquiries', [
            'full_name' => 'Jordan Example',
            'email' => 'jordan@example.com',
            'project_type' => 'web_app_development',
            'message' => 'I need a custom web platform.',
        ]);
        $this->assertSame(1, ContactInquiry::count());
        Mail::assertSent(ContactInquiryReceived::class, fn (ContactInquiryReceived $mail) => $mail->hasTo('creativewaff@gmail.com')
            && $mail->hasTo('bryanwaff5@gmail.com')
            && $mail->hasReplyTo('jordan@example.com'));
    }

    public function test_contact_inquiry_rejects_invalid_project_types(): void
    {
        $this->from(route('contact'))->post(route('contact.store'), [
            'full_name' => 'Jordan Example',
            'email' => 'jordan@example.com',
            'project_type' => 'not-a-project-type',
            'message' => 'I need a custom web platform.',
        ])->assertRedirect(route('contact'))
            ->assertSessionHasErrors('project_type');

        $this->assertDatabaseCount('contact_inquiries', 0);
    }

    public function test_service_catalog_can_filter_by_category_and_search(): void
    {
        $this->seed(CreativeWaffSeeder::class);

        Livewire::test('catalog-filter')
            ->assertSee('Full-Stack Web & App Development')
            ->set('category', 'production')
            ->assertSee('Hybrid Event & Live Stream Production')
            ->assertDontSee('Full-Stack Web & App Development')
            ->set('category', 'all')
            ->set('search', 'CW-DES-003')
            ->assertSee('Motion Graphics & Visual Identity')
            ->assertDontSee('Full-Stack Web & App Development');
    }

    public function test_project_portfolio_can_filter_by_category_and_search(): void
    {
        $this->seed(CreativeWaffSeeder::class);

        Livewire::test('project-filter')
            ->assertSee('UNFPA Kenya Campaign')
            ->set('category', 'Web App')
            ->assertSee('Enterprise Web Application')
            ->assertDontSee('UNFPA Kenya Campaign')
            ->set('category', 'all')
            ->set('search', 'Water Resources')
            ->assertSee('Water Resources Authority Strategic Plan Launch')
            ->assertDontSee('Enterprise Web Application');
    }
}
