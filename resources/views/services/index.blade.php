<x-app-layout>
    <x-slot name="title">Creative Waff Catalog | Services</x-slot>
    <x-slot name="metaDescription">Explore Creative Waff's software engineering, live event production, and motion graphics packages.</x-slot>

    <div class="mx-auto w-full max-w-5xl space-y-10 py-8">
        <header class="space-y-3 text-center">
            <h1 class="text-4xl font-black text-white sm:text-5xl">Creative Waff Catalog</h1>
            <p class="text-lg text-gray-400">Professional engineering and production packages synchronized with Meta Commerce Manager.</p>
        </header>

        @livewire('catalog-filter')
    </div>
</x-app-layout>
