<x-app-layout>
    <x-slot name="title">Get in Touch | Creative Waff</x-slot>
    <x-slot name="metaDescription">Contact Creative Waff about software development, live event production, and creative design in Nairobi, Kenya.</x-slot>

    <div class="mx-auto w-full max-w-5xl space-y-10 py-8">
        <header class="space-y-3 text-center">
            <h1 class="text-4xl font-black text-white sm:text-5xl">Get in Touch</h1>
            <p class="mx-auto max-w-2xl text-gray-400">Ready to discuss a development project, live event, or creative asset? Reach out directly via WhatsApp or send a message below.</p>
        </header>

        @if(session('status'))
            <div role="{{ session('notification_failed') ? 'alert' : 'status' }}" class="space-y-3 rounded-xl border {{ session('notification_failed') ? 'border-amber-500/30 bg-amber-500/10 text-amber-200' : 'border-green-500/30 bg-green-500/10 text-green-300' }} px-5 py-4">
                <p>{{ session('status') }}</p>
                <p class="text-sm">You can also send the inquiry details directly on WhatsApp:</p>
                <a href="{{ session('whatsapp_url') }}" target="_blank" rel="noopener noreferrer" class="inline-flex rounded-lg bg-green-600 px-4 py-2 font-semibold text-white transition hover:bg-green-500">
                    Send via WhatsApp
                </a>
            </div>
        @endif

        <div class="grid gap-8 md:grid-cols-2">
            <section aria-label="Contact information" class="space-y-5 rounded-2xl border border-gray-800 bg-gray-900/60 p-6 sm:p-8">
                <h2 class="text-xl font-bold text-white">Creative Waff</h2>
                <dl class="space-y-4 text-sm">
                    <div>
                        <dt class="font-semibold text-gray-400">Lead Engineer / Director</dt>
                        <dd class="mt-1 text-white">Bryan Wafula Simiyu</dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-gray-400">Address</dt>
                        <dd class="mt-1 text-white">Neema Avenue, Nairobi, Kenya</dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-gray-400">Official Phone</dt>
                        <dd class="mt-1"><a href="tel:+254707765867" class="text-white hover:text-amber-400">+254 707 765 867</a></dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-gray-400">Official Email</dt>
                        <dd class="mt-1 space-y-1">
                            <a href="mailto:creativewaff@gmail.com" class="block text-white hover:text-amber-400">creativewaff@gmail.com</a>
                            <a href="mailto:bryanwaff5@gmail.com" class="block text-white hover:text-amber-400">bryanwaff5@gmail.com</a>
                        </dd>
                    </div>
                    <div>
                        <dt class="font-semibold text-gray-400">Business Hours</dt>
                        <dd class="mt-1 text-white">Monday – Friday: 8:00 AM – 6:00 PM (EAT)</dd>
                    </div>
                </dl>
                <a href="https://wa.me/254707765867" target="_blank" rel="noopener noreferrer" class="inline-flex rounded-xl bg-green-600 px-5 py-3 font-bold text-white transition hover:bg-green-500">
                    Instant WhatsApp Chat
                </a>
            </section>

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-5 rounded-2xl border border-gray-800 bg-gray-900/60 p-6 sm:p-8">
                @csrf
                <h2 class="text-xl font-bold text-white">Send a Project Inquiry</h2>

                <div>
                    <label for="full_name" class="mb-1.5 block text-sm font-semibold text-gray-300">Full Name <span aria-hidden="true">*</span></label>
                    <input id="full_name" name="full_name" type="text" value="{{ old('full_name') }}" required autocomplete="name" maxlength="255" class="w-full rounded-lg border border-gray-700 bg-gray-950 px-4 py-3 text-white focus:border-amber-500 focus:outline-none">
                    @error('full_name') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="email" class="mb-1.5 block text-sm font-semibold text-gray-300">Email Address <span aria-hidden="true">*</span></label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" maxlength="255" class="w-full rounded-lg border border-gray-700 bg-gray-950 px-4 py-3 text-white focus:border-amber-500 focus:outline-none">
                    @error('email') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="project_type" class="mb-1.5 block text-sm font-semibold text-gray-300">Project Type <span aria-hidden="true">*</span></label>
                    <select id="project_type" name="project_type" required class="w-full rounded-lg border border-gray-700 bg-gray-950 px-4 py-3 text-white focus:border-amber-500 focus:outline-none">
                        <option value="">Select a project type</option>
                        <option value="web_app_development" @selected(old('project_type') === 'web_app_development')>Web/App Development</option>
                        <option value="live_event_production" @selected(old('project_type') === 'live_event_production')>Live Event Production</option>
                        <option value="motion_design_branding" @selected(old('project_type') === 'motion_design_branding')>Motion Design & Branding</option>
                        <option value="consulting" @selected(old('project_type') === 'consulting')>Consulting</option>
                    </select>
                    @error('project_type') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="timeline_budget" class="mb-1.5 block text-sm font-semibold text-gray-300">Estimated Timeline & Budget <span class="font-normal text-gray-500">(Optional)</span></label>
                    <input id="timeline_budget" name="timeline_budget" type="text" value="{{ old('timeline_budget') }}" maxlength="255" class="w-full rounded-lg border border-gray-700 bg-gray-950 px-4 py-3 text-white focus:border-amber-500 focus:outline-none">
                    @error('timeline_budget') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="message" class="mb-1.5 block text-sm font-semibold text-gray-300">Message / Project Details <span aria-hidden="true">*</span></label>
                    <textarea id="message" name="message" rows="5" required maxlength="5000" class="w-full rounded-lg border border-gray-700 bg-gray-950 px-4 py-3 text-white focus:border-amber-500 focus:outline-none">{{ old('message') }}</textarea>
                    @error('message') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="w-full rounded-xl bg-amber-500 px-5 py-3 font-bold text-gray-950 transition hover:bg-amber-400">
                    Submit Project Inquiry
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
