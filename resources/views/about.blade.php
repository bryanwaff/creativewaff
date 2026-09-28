<x-app-layout>
    <x-slot name="title">About Creative Waff | Software, Design & Production</x-slot>
    <x-slot name="metaDescription">Meet Creative Waff, led by Bryan Wafula, delivering software development, visual design, and live event production in one dependable team.</x-slot>

    <div class="mx-auto max-w-5xl space-y-16 py-8">
        <section class="space-y-4 text-center">
            <h1 class="text-4xl font-black text-white sm:text-5xl">About Creative Waff</h1>
            <p class="text-xl font-medium text-amber-500">Bridging technology, design, and live execution.</p>
        </section>

        <section class="space-y-5 rounded-2xl border border-gray-800 bg-gray-900/60 p-8 leading-relaxed text-gray-300 sm:p-10">
            <p>
                Creative Waff, led by Bryan Wafula, operates at the intersection of technical software development, visual design, and live event production. Modern brands don't just need a website or a static design—they need cohesive digital systems and high-production experiences that build trust and engagement.
            </p>
            <p>
                With over 3 years of hands-on experience across full-stack engineering, motion design, social campaigns, and live broadcast switching, Creative Waff serves as a single, dependable execution partner. We eliminate the friction of managing separate agency teams by delivering end-to-end technical stability and creative excellence under one roof.
            </p>
        </section>

        <section class="space-y-6">
            <h2 class="text-2xl font-bold text-white">Core Capabilities</h2>
            <div class="grid gap-5 md:grid-cols-3">
                <article class="rounded-xl border border-gray-800 bg-gray-900/50 p-6">
                    <h3 class="font-bold text-amber-400">Software & Web Architecture</h3>
                    <p class="mt-3 text-sm leading-relaxed text-gray-400">Laravel, custom CMS development, database design, REST APIs, and Meta Commerce catalog synchronization.</p>
                </article>
                <article class="rounded-xl border border-gray-800 bg-gray-900/50 p-6">
                    <h3 class="font-bold text-amber-400">Live & Hybrid Production</h3>
                    <p class="mt-3 text-sm leading-relaxed text-gray-400">Multi-camera switching, corporate streaming setups, broadcast graphics, and stage AV management.</p>
                </article>
                <article class="rounded-xl border border-gray-800 bg-gray-900/50 p-6">
                    <h3 class="font-bold text-amber-400">Creative & Visual Design</h3>
                    <p class="mt-3 text-sm leading-relaxed text-gray-400">Motion graphics, 2D/3D visual overlays, digital branding, and social media campaign design.</p>
                </article>
            </div>
        </section>

        <section class="space-y-6">
            <div class="flex flex-wrap items-end justify-between gap-4">
                <h2 class="text-2xl font-bold text-white">Featured Work & Case Studies</h2>
                <a href="{{ route('projects.index') }}" class="font-semibold text-amber-400 hover:text-amber-300">Explore All Projects <span aria-hidden="true">→</span></a>
            </div>
            <div class="grid gap-5 md:grid-cols-3">
                @foreach($projects as $project)
                    <a href="{{ route('projects.show', $project->slug) }}" class="rounded-xl border border-gray-800 bg-gray-900/50 p-6 transition hover:border-amber-500/40">
                        <span class="text-xs font-mono text-amber-400">{{ $project->category }}</span>
                        <h3 class="mt-3 font-bold text-white">{{ $project->title }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-gray-400">{{ $project->summary }}</p>
                    </a>
                @endforeach
            </div>
        </section>
    </div>
</x-app-layout>
