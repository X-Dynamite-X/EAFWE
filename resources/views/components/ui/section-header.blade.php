@props(['title', 'subtitle' => null, 'description' => null, 'centered' => true])

<div class="{{ $centered ? 'text-center' : '' }} mb-16">
    <h2 class="text-4xl font-black text-charcoal-900 mb-4">{{ $title }}</h2>
    @if ($subtitle)
        <p class="text-xl text-gold-400 font-bold border-r-4 border-gold-500 pr-4 inline-block">{{ $subtitle }}</p>
    @endif
    <div class="w-24 h-1.5 bg-gold-500 {{ $centered ? 'mx-auto' : '' }} rounded-full mt-4"></div>
    @if ($description)
        <p class="mt-6 text-xl text-charcoal-800 max-w-3xl {{ $centered ? 'mx-auto' : '' }} leading-relaxed">
            {{ $description }}
        </p>
    @endif
</div>
