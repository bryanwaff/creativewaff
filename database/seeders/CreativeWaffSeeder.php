<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Database\Seeder;

class CreativeWaffSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Full-Stack Web & App Development',
                'slug' => 'web-app-development',
                'category' => 'development',
                'meta_catalog_id' => 'CW-WEB-001',
                'short_description' => 'Custom Laravel applications, mobile solutions, and enterprise platforms tailored to your business workflow.',
                'full_description' => 'Custom software development tailored to your exact operational requirements. We handle database schema design, CMS architecture, API integrations (including WhatsApp Business & Meta Commerce), security configurations, and responsive user interfaces.',
                'price' => 85000,
                'currency' => 'KES',
                'whatsapp_message' => "Hi Bryan! I am interested in Full-Stack Web Development (Ref: CW-WEB-001). Let's discuss scope.",
                'features' => [
                    'Custom Laravel architecture & RESTful APIs',
                    'Meta Commerce & WhatsApp Business backend integration',
                    'Custom CMS for blog/news management & role-based access',
                    'Domain registration, SSL setup, and deployment',
                ],
                'is_featured' => true,
            ],
            [
                'name' => 'Hybrid Event & Live Stream Production',
                'slug' => 'live-event-production',
                'category' => 'production',
                'meta_catalog_id' => 'CW-EVT-002',
                'short_description' => 'End-to-end technical production, multi-camera switching, and streaming for corporate events.',
                'full_description' => 'Complete technical execution for hybrid summits, product launches, and corporate conferences. We manage multi-input video switching, professional audio routing, live graphic overlays, and multi-destination broadcast streaming.',
                'price' => 60000,
                'currency' => 'KES',
                'whatsapp_message' => 'Hi Bryan! I want to inquire about Hybrid Event Production (Ref: CW-EVT-002) for an upcoming event.',
                'features' => [
                    'Multi-camera switching & broadcast audio setup',
                    'Live stream encoding to YouTube, LinkedIn, or custom portals',
                    'Custom animated lower-thirds & event graphics',
                    'On-site technical director & AV management',
                ],
                'is_featured' => true,
            ],
            [
                'name' => 'Motion Graphics & Visual Identity',
                'slug' => 'motion-graphics-branding',
                'category' => 'design',
                'meta_catalog_id' => 'CW-DES-003',
                'short_description' => 'Custom motion graphics, broadcast assets, and brand visual systems for modern digital platforms.',
                'full_description' => 'Elevate your visual presence with custom motion design and brand assets. From animated promo videos and broadcast graphics packages to complete visual identity systems and social media campaign designs, we create assets built for digital impact.',
                'price' => 35000,
                'currency' => 'KES',
                'whatsapp_message' => 'Hi Bryan! I need Motion Graphics & Visual Design work (Ref: CW-DES-003). Can we review my project?',
                'features' => [
                    '2D/3D motion graphics & video intro packages',
                    'Broadcast-ready transparent lower-thirds & overlays',
                    'Visual identity guidelines & vector brand assets',
                    'Social media graphics & campaign layout design',
                ],
                'is_featured' => true,
            ],
            [
                'name' => 'Social Media Design',
                'slug' => 'social-media-design',
                'category' => 'design',
                'meta_catalog_id' => 'CW-DES-004',
                'short_description' => 'Custom social media graphics and campaign assets for digital platforms.',
                'full_description' => 'Elevate your visual presence with custom social media graphics and campaign assets. From animated promo videos and broadcast graphics packages to complete visual identity systems and social media campaign designs, we create assets built for digital impact.',
                'price' => 10000,
                'currency' => 'KES',
                'whatsapp_message' => 'Hi Bryan! I need Social Media Design work (Ref: CW-DES-004). Can we review my project?',
                'features' => [
                    'Custom posts and content templates',
                    'Social Media Branding',
                    'Profile banners, highlight covers, profile frames, and brand‑consistent layouts.',
                    'High‑impact visuals optimized for Facebook & Instagram advertising.',
                ],
                'is_featured' => true,
            ],
            [
                'name' => 'Corporate Branding & Visual Identity',
                'slug' => 'corporate-branding-identity',
                'category' => 'design',
                'meta_catalog_id' => 'CW-DES-005',
                'short_description' => 'Comprehensive corporate branding and visual identity design for businesses.',
                'full_description' => 'We create cohesive corporate branding and visual identity systems that reflect your company’s values and mission. Our services include logo design, brand guidelines, stationery, and marketing collateral to ensure a consistent brand presence across all platforms.',
                'price' => 50000,
                'currency' => 'KES',
                'whatsapp_message' => 'Hi Bryan! I am interested in Corporate Branding & Visual Identity (Ref: CW-DES-005). Let’s discuss my project.',
                'features' => [
                    'Logo design and brand mark creation',
                    'Comprehensive brand guidelines and style guides',
                    'Stationery design including business cards, letterheads, and envelopes',
                    'Marketing collateral such as brochures, flyers, and posters',
                ],
                'is_featured' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }

        Project::whereIn('slug', ['corporate-hybrid-summit', 'custom-enterprise-web-app'])
            ->update(['is_featured' => false]);

        $projects = [
            [
                'title' => 'UNFPA Kenya Campaign — Choose Peace Be Peace',
                'slug' => 'unfpa-kenya-choose-peace-be-peace',
                'category' => 'Campaign Design',
                'summary' => 'Multi-channel social media campaign design and digital media assets for the Choose Peace Be Peace campaign.',
                'description' => 'Creative Waff developed campaign visuals and digital media assets for UNFPA Kenya’s Choose Peace Be Peace initiative, designed for consistent use across social channels.',
                'client_name' => 'UNFPA Kenya',
                'is_featured' => true,
            ],
            [
                'title' => 'Water Resources Authority Strategic Plan Launch',
                'slug' => 'wra-strategic-plan-launch',
                'category' => 'Visual Branding',
                'summary' => 'Strategic Plan launch visual branding and social media campaign collateral for the Water Resources Authority.',
                'description' => 'A cohesive visual package for the Water Resources Authority Strategic Plan launch, including branded campaign collateral prepared for digital and social media.',
                'client_name' => 'Water Resources Authority (WRA)',
                'is_featured' => true,
            ],
            [
                'title' => 'Enterprise Web Application',
                'slug' => 'enterprise-web-application',
                'category' => 'Web App',
                'summary' => 'Full-stack website setup, thematic concept design, CMS integration, and deployment.',
                'description' => 'An end-to-end enterprise web application project covering full-stack website setup, thematic concept design, content management integration, and deployment.',
                'client_name' => null,
                'is_featured' => true,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['slug' => $project['slug']], $project);
        }
    }
}
