{{-- Language and Theme Switcher Component --}}

<div class="flex items-center gap-2" x-data="{ langOpen: false, darkMode:false }">
    {{-- Language Switcher --}}
    <div class="relative">
        <button @click="langOpen = !langOpen"
            class="flex items-center gap-2 px-3 py-2 rounded-lg bg-gold-600 text-white hover:bg-gold-500 transition-colors"
            title="Switch Language">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M4.48 7.45a.75.75 0 0 0 0 1.06l4.72 4.72a.75.75 0 1 0 1.06-1.06L5.54 7.45a.75.75 0 0 0-1.06 0z"
                    clip-rule="evenodd" />
                <path fill-rule="evenodd"
                    d="M15.52 7.45a.75.75 0 0 1 0 1.06l-4.72 4.72a.75.75 0 1 1-1.06-1.06l4.72-4.72a.75.75 0 0 1 1.06 0z"
                    clip-rule="evenodd" />
            </svg>
            <span class="text-sm font-semibold">{{ strtoupper(app()->getLocale()) }}</span>
        </button>

        <div x-show="langOpen" @click.away="langOpen = false" x-transition
            class="absolute left-0 mt-2 w-24 bg-white border border-gray-200 rounded-lg shadow-lg z-50">

            @foreach (['en' => 'English', 'ar' => 'العربية'] as $lang => $name)
                <a href="{{ route('lang.switch', $lang) }}" @click="langOpen = false"
                    class="block w-full px-4 py-2 text-sm hover:bg-gray-100 transition-colors
                    {{ app()->getLocale() === $lang ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-700' }}
                    {{ $loop->first ? 'rounded-t-lg' : '' }}
                    {{ $loop->last ? 'rounded-b-lg' : '' }}">
                    {{ $name }}
                </a>
            @endforeach
        </div>
    </div>


</div>
