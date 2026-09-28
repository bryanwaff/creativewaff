<x-app-layout>
    <x-slot name="title">{{ $project->title }} | Creative Waff</x-slot>
    <x-slot name="metaDescription">{{ $project->summary }}</x-slot>

    <div class="w-full space-y-14 py-8">
        <article class="mx-auto max-w-3xl space-y-7">
            <a href="{{ route('projects.index') }}" class="text-sm font-semibold text-amber-400 hover:text-amber-300">← All Projects</a>
            <header class="space-y-4 border-b border-gray-800 pb-7">
                <span class="inline-block rounded-md border border-amber-500/20 bg-amber-500/10 px-2.5 py-1 font-mono text-xs text-amber-400">{{ $project->category }}</span>
                <h1 class="text-3xl font-black text-white sm:text-4xl">{{ $project->title }}</h1>
                @if($project->client_name)
                    <p class="text-sm text-gray-400">Client: {{ $project->client_name }}</p>
                @endif
                <p class="text-lg leading-relaxed text-gray-300">{{ $project->summary }}</p>
            </header>
            <p class="leading-relaxed text-gray-300">{{ $project->description }}</p>
            <a href="{{ route('contact') }}" class="inline-flex rounded-xl bg-amber-500 px-6 py-3 font-bold text-gray-950 transition hover:bg-amber-400">Discuss a Similar Project</a>
        </article>

        @if($relatedProjects->isNotEmpty())
            <section class="mx-auto max-w-3xl space-y-6" aria-labelledby="related-projects-heading">
                <div>
                    <h2 id="related-projects-heading" class="text-2xl font-bold text-white">Related Projects</h2>
                    <p class="mt-2 text-sm text-gray-400">Explore more work from Creative Waff.</p>
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    @foreach($relatedProjects as $relatedProject)
                        <a href="{{ route('projects.show', $relatedProject->slug) }}" class="flex h-full flex-col rounded-2xl border border-gray-800 bg-gray-900/60 p-6 transition hover:border-amber-500/40">
                            <span class="text-xs font-mono text-amber-400">{{ $relatedProject->category }}</span>
                            <h3 class="mt-3 text-lg font-bold text-white">{{ $relatedProject->title }}</h3>
                            <p class="mt-3 text-sm leading-relaxed text-gray-400">{{ $relatedProject->summary }}</p>
                            <span class="mt-auto inline-flex pt-5 font-semibold text-amber-400">View Case Study <span class="ml-1" aria-hidden="true">→</span></span>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
</x-app-layout>
