<x-app-layout>
    <x-slot name="title">Projects & Case Studies | Creative Waff</x-slot>
    <x-slot name="metaDescription">Selected software, campaign design, and production work by Creative Waff.</x-slot>

    <div class="mx-auto w-full max-w-5xl space-y-10 py-8">
        <header class="space-y-3 text-center">
            <h1 class="text-4xl font-black text-white sm:text-5xl">Projects & Case Studies</h1>
            <p class="text-gray-400">Selected work across software, creative design, and live production.</p>
        </header>

        @livewire('project-filter')
    </div>
</x-app-layout>
