<?php

use App\Models\Project;
use function Livewire\Volt\{computed, state, updated, usesPagination};

usesPagination();

state(['category' => 'all', 'search' => '']);

$setCategory = function (string $category): void {
    $this->category = $category;
    $this->resetPage();
};

updated(['search' => fn () => $this->resetPage()]);

$projects = computed(function () {
    return Project::query()
        ->when($this->category !== 'all', fn ($query) => $query->where('category', $this->category))
        ->when($this->search !== '', fn ($query) => $query->where(function ($query) {
            $query->where('title', 'like', "%{$this->search}%")
                ->orWhere('summary', 'like', "%{$this->search}%")
                ->orWhere('client_name', 'like', "%{$this->search}%");
        }))
        ->latest()
        ->paginate(9);
});

?>

<div>
    <div class="mb-8 flex flex-col items-start justify-between gap-4 md:flex-row md:items-center">
        <div class="flex flex-wrap gap-2">
            <button wire:click="setCategory('all')"
                    aria-pressed="{{ $category === 'all' ? 'true' : 'false' }}"
                    class="rounded-lg px-4 py-2 text-sm font-semibold {{ $category === 'all' ? 'bg-amber-500 text-gray-950' : 'bg-gray-800 text-gray-300' }}">
                All Projects
            </button>
            <button wire:click="setCategory('Campaign Design')"
                    aria-pressed="{{ $category === 'Campaign Design' ? 'true' : 'false' }}"
                    class="rounded-lg px-4 py-2 text-sm font-semibold {{ $category === 'Campaign Design' ? 'bg-amber-500 text-gray-950' : 'bg-gray-800 text-gray-300' }}">
                Campaign Design
            </button>
            <button wire:click="setCategory('Visual Branding')"
                    aria-pressed="{{ $category === 'Visual Branding' ? 'true' : 'false' }}"
                    class="rounded-lg px-4 py-2 text-sm font-semibold {{ $category === 'Visual Branding' ? 'bg-amber-500 text-gray-950' : 'bg-gray-800 text-gray-300' }}">
                Visual Branding
            </button>
            <button wire:click="setCategory('Web App')"
                    aria-pressed="{{ $category === 'Web App' ? 'true' : 'false' }}"
                    class="rounded-lg px-4 py-2 text-sm font-semibold {{ $category === 'Web App' ? 'bg-amber-500 text-gray-950' : 'bg-gray-800 text-gray-300' }}">
                Web Apps
            </button>
        </div>

        <label class="w-full md:w-72">
            <span class="sr-only">Search projects</span>
            <input type="search" wire:model.live.debounce.300ms="search" placeholder="Search projects..."
                   class="w-full rounded-lg border border-gray-800 bg-gray-900 px-4 py-2 text-sm text-gray-200 focus:border-amber-500 focus:outline-none" />
        </label>
    </div>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse($this->projects as $project)
            <article class="flex h-full flex-col rounded-2xl border border-gray-800 bg-gray-900/60 p-6">
                <span class="text-xs font-mono text-amber-400">{{ $project->category }}</span>
                <h2 class="mt-3 text-xl font-bold text-white">{{ $project->title }}</h2>
                <p class="mt-3 text-sm leading-relaxed text-gray-400">{{ $project->summary }}</p>
                <a href="{{ route('projects.show', $project->slug) }}" class="mt-auto inline-flex pt-5 font-semibold text-amber-400 hover:text-amber-300">
                    View Case Study <span class="ml-1" aria-hidden="true">→</span>
                </a>
            </article>
        @empty
            <p class="col-span-full rounded-xl border border-gray-800 bg-gray-900/60 p-6 text-center text-gray-400">
                No projects match your search. Try another search or category.
            </p>
        @endforelse
    </div>

    <div class="mt-8">{{ $this->projects->links() }}</div>
</div>
