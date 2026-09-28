<x-app-layout>
    <x-slot name="title">{{ $service->name }} | Creative Waff</x-slot>
    <x-slot name="metaDescription">{{ $service->short_description }}</x-slot>

    <script type="application/ld+json">
        {{ Illuminate\Support\Js::encode([
            '@context' => 'https://schema.org/',
            '@type' => 'Service',
            'name' => $service->name,
            'description' => $service->short_description,
            'provider' => ['@type' => 'LocalBusiness', 'name' => 'Creative Waff'],
            'offers' => ['@type' => 'Offer', 'price' => $service->price, 'priceCurrency' => $service->currency],
        ]) }}
    </script>

    <div class="max-w-3xl mx-auto space-y-8 py-8">
        <div class="flex flex-wrap justify-between items-center gap-4 border-b border-gray-800 pb-6">
            <span class="text-xs font-mono bg-amber-500/10 text-amber-400 px-3 py-1.5 rounded-md border border-amber-500/20">
                Meta Catalog ID: {{ $service->meta_catalog_id }}
            </span>
            <span class="text-right text-2xl font-black text-white">
                Starting from {{ $service->currency === 'KES' ? 'Kshs.' : $service->currency }}
                {{ number_format((float) $service->price, 2) }}
            </span>
        </div>

        <div class="space-y-4">
            <h1 class="text-3xl sm:text-4xl font-black text-white tracking-tight">{{ $service->name }}</h1>
            <p class="text-lg text-gray-300 leading-relaxed">{{ $service->full_description }}</p>
        </div>

        @if(!empty($service->features))
            <div class="border border-gray-800 bg-gray-900/60 rounded-2xl p-6 space-y-4">
                <h3 class="text-base font-bold text-white">Key Deliverables & Specifications</h3>
                <ul class="space-y-3 text-sm text-gray-300">
                    @foreach($service->features as $feature)
                        <li class="flex items-center gap-3">
                            <span class="text-amber-500 font-bold">✓</span>
                            <span>{{ $feature }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="pt-4">
            <a href="{{ $service->whatsapp_url }}" target="_blank" rel="noopener noreferrer"
               class="w-full inline-flex justify-center items-center bg-green-600 hover:bg-green-500 text-white font-bold py-4 px-8 rounded-xl text-lg transition shadow-lg shadow-green-600/10">
                Inquire via WhatsApp Business
            </a>
        </div>
    </div>
</x-app-layout>
