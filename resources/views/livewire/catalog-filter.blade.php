<?php

use App\Models\Service;
use function Livewire\Volt\{computed, state, updated};

state(['category' => 'all', 'search' => '']);

$setCategory = function (string $category): void {
    $this->category = $category;
};

$services = computed(function () {
    return Service::query()
        ->when($this->category !== 'all', fn($q) => $q->where('category', $this->category))
        ->when($this->search !== '', fn($q) => $q->where(function ($query) {
            $query->where('name', 'like', "%{$this->search}%")
                ->orWhere('short_description', 'like', "%{$this->search}%")
                ->orWhere('meta_catalog_id', 'like', "%{$this->search}%");
        }))
        ->orderBy('id')
        ->get();
});

?>

<div>
    <div class="mb-8 flex flex-col items-start justify-between gap-4 md:flex-row md:items-center">
        <div class="flex flex-wrap gap-2">
            <button wire:click="setCategory('all')"
                    aria-pressed="{{ $category === 'all' ? 'true' : 'false' }}"
                    class="rounded-lg px-4 py-2 text-sm font-semibold {{ $category === 'all' ? 'bg-amber-500 text-gray-950' : 'bg-gray-800 text-gray-300' }}">
                All Offerings
            </button>
            <button wire:click="setCategory('development')"
                    aria-pressed="{{ $category === 'development' ? 'true' : 'false' }}"
                    class="rounded-lg px-4 py-2 text-sm font-semibold {{ $category === 'development' ? 'bg-amber-500 text-gray-950' : 'bg-gray-800 text-gray-300' }}">
                Software Dev
            </button>
            <button wire:click="setCategory('production')"
                    aria-pressed="{{ $category === 'production' ? 'true' : 'false' }}"
                    class="rounded-lg px-4 py-2 text-sm font-semibold {{ $category === 'production' ? 'bg-amber-500 text-gray-950' : 'bg-gray-800 text-gray-300' }}">
                Live Events
            </button>
            <button wire:click="setCategory('design')"
                    aria-pressed="{{ $category === 'design' ? 'true' : 'false' }}"
                    class="rounded-lg px-4 py-2 text-sm font-semibold {{ $category === 'design' ? 'bg-amber-500 text-gray-950' : 'bg-gray-800 text-gray-300' }}">
                Motion & Design
            </button>
        </div>

        <label class="w-full md:w-72">
            <span class="sr-only">Search service catalog</span>
            <input type="search" wire:model.live="search" placeholder="Search services..."
                   class="w-full rounded-lg border border-gray-800 bg-gray-900 px-4 py-2 text-sm text-gray-200 focus:border-amber-500 focus:outline-none" />
        </label>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse($this->services as $service)
            <article class="flex flex-col justify-between rounded-2xl border border-gray-800 bg-gray-900/60 p-6 transition hover:border-amber-500/40">
                <div class="space-y-4">
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <span class="rounded-md border border-amber-500/20 bg-amber-500/10 px-2.5 py-1 font-mono text-xs text-amber-400">
                            {{ $service->meta_catalog_id }}
                        </span>
                    </div>

                    <h2 class="text-xl font-bold text-white">{{ $service->name }}</h2>
                    <p class="text-sm leading-relaxed text-gray-400">{{ $service->short_description }}</p>
                    <p class="font-bold text-white">
                        Starting from {{ $service->currency === 'KES' ? 'Kshs.' : $service->currency }}
                        {{ number_format((float) $service->price, 2) }}
                    </p>

                    @if($service->features)
                        <ul class="space-y-2 text-xs text-gray-300">
                            @foreach($service->features as $feature)
                                <li class="flex items-center gap-2">
                                    <span class="text-amber-500">✓</span> {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="mt-6 space-y-3 border-t border-gray-800 pt-4">
                    <a href="{{ route('services.show', $service->slug) }}" class="block rounded-xl bg-amber-500 px-4 py-3 text-center text-sm font-bold text-gray-950 transition hover:bg-amber-400">
                        View Details
                    </a>
                </div>
            </article>
        @empty
            <p class="col-span-full rounded-xl border border-gray-800 bg-gray-900/60 p-6 text-center text-gray-400">
                No services match your search. Try another search or category.
            </p>
        @endforelse
    </div>
</div>
