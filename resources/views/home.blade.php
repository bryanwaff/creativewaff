<x-app-layout>
    <x-slot name="title">Creative Waff | Software Engineering & Live Production</x-slot>
    <x-slot name="metaDescription">Custom web applications, hybrid event production, motion graphics, and digital experiences—built with technical precision and creative direction.</x-slot>

    <div class="space-y-20 py-8">
        <section class="mx-auto max-w-4xl space-y-8 text-center">
            <h1 class="text-4xl font-black leading-tight tracking-tight text-white sm:text-5xl md:text-6xl">
                Software Engineering Meets
                <span class="text-amber-500">High-Impact Live Production.</span>
            </h1>
            <p class="mx-auto max-w-3xl text-lg leading-relaxed text-gray-400 md:text-xl">
                Custom web applications, hybrid event production, motion graphics, and digital experiences—built with technical precision and creative direction.
            </p>
            <div class="flex flex-col items-center justify-center gap-4 pt-2 sm:flex-row">
                <a href="{{ route('services.index') }}" class="inline-flex w-full items-center justify-center rounded-xl bg-amber-500 px-8 py-3.5 font-bold text-gray-950 transition hover:bg-amber-400 sm:w-auto">
                    Explore Services
                </a>
                <a href="https://wa.me/254707765867?text=Hi%20Bryan!%20I%20am%20visiting%20Creative%20Waff%20and%20would%20like%20to%20discuss%20a%20project" target="_blank" rel="noopener noreferrer" class="inline-flex w-full items-center justify-center rounded-xl bg-green-600 px-8 py-3.5 font-bold text-white transition hover:bg-green-500 sm:w-auto">
                    Chat on WhatsApp
                </a>
            </div>
        </section>

        <section class="mx-auto max-w-4xl space-y-5 text-center">
            <h2 class="text-2xl font-bold tracking-tight text-white sm:text-3xl">Engineered for Performance. Designed for Engagement.</h2>
            <p class="leading-relaxed text-gray-400">
                At Creative Waff, we bridge the gap between technical software infrastructure and high-end visual design. Whether you are launching a scalable web platform or streaming a multi-camera corporate summit, we deliver end-to-end execution that ensures reliability, brand consistency, and measurable results.
            </p>
        </section>

        <section class="space-y-10">
            <div class="space-y-2 text-center">
                <h2 class="text-2xl font-bold tracking-tight text-white sm:text-3xl">Core Offerings</h2>
                <p class="text-sm text-gray-400">Standardized service offerings integrated directly with our Meta & WhatsApp Business catalog.</p>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                @foreach($featuredServices as $service)
                    <article class="flex flex-col justify-between rounded-2xl border border-gray-800 bg-gray-900/60 p-6 transition hover:border-amber-500/40">
                        <div class="space-y-4">
                            <span class="inline-block rounded-md border border-amber-500/20 bg-amber-500/10 px-2.5 py-1 font-mono text-xs text-amber-400">
                                {{ $service->meta_catalog_id }}
                            </span>
                            <h3 class="text-xl font-bold leading-snug text-white">{{ $service->name }}</h3>
                            <p class="text-sm leading-relaxed text-gray-400">{{ $service->short_description }}</p>
                        </div>
                        <div class="mt-6 border-t border-gray-800 pt-5">
                            <a href="{{ route('services.show', $service->slug) }}" class="text-sm font-semibold text-amber-400 transition hover:text-amber-300">
                                View Details <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="space-y-4 rounded-2xl border border-amber-500/20 bg-amber-500/5 px-6 py-10 text-center sm:px-10">
            <h2 class="text-2xl font-bold text-white sm:text-3xl">Planning a project or upcoming live event?</h2>
            <p class="mx-auto max-w-2xl text-gray-400">Connect directly on WhatsApp for technical consultation, scope evaluation, or immediate scheduling.</p>
            <a href="https://wa.me/254707765867?text=Hi%20Bryan!%20I%20have%20an%20upcoming%20project%2Fevent%20and%20want%20to%20discuss" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-xl bg-green-600 px-7 py-3 font-bold text-white transition hover:bg-green-500">
                Connect on WhatsApp
            </a>
        </section>
    </div>
</x-app-layout>
