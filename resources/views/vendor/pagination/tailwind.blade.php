@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="pagination-wrapper py-6">
        <div class="flex items-center justify-between">
            {{-- Mobile Previous/Next --}}
            <div class="flex flex-1 justify-between sm:hidden">
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex cursor-default select-none items-center rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-400">
                        {{ __('السابق') }}
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="inline-flex items-center rounded-lg bg-gold-500 px-4 py-2 text-sm font-medium text-white transition-all duration-300 hover:bg-gold-600 active:scale-95">
                        {{ __('السابق') }}
                    </a>
                @endif

                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="inline-flex items-center rounded-lg bg-gold-500 px-4 py-2 text-sm font-medium text-white transition-all duration-300 hover:bg-gold-600 active:scale-95">
                        {{ __('التالي') }}
                    </a>
                @else
                    <span class="relative inline-flex cursor-default select-none items-center rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-400">
                        {{ __('التالي') }}
                    </span>
                @endif
            </div>

            {{-- Desktop Pagination --}}
            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-center">
                <div class="flex items-center gap-1">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span class="flex h-10 w-10 cursor-not-allowed items-center justify-center rounded-lg border border-gray-200 bg-gray-50 text-gray-400 transition-all duration-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" class="flex h-10 w-10 items-center justify-center rounded-lg border border-gold-300 bg-white text-gold-600 transition-all duration-300 hover:bg-gold-50 active:scale-95">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span class="flex h-10 w-10 items-center justify-center text-sm font-medium text-gray-500">
                                {{ $element }}
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-gold-500 text-sm font-semibold text-white transition-all duration-300 shadow-md">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="flex h-10 w-10 items-center justify-center rounded-lg border border-gray-200 bg-white text-sm font-medium text-gray-700 transition-all duration-300 hover:border-gold-300 hover:bg-gold-50 hover:text-gold-600 active:scale-95">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" class="flex h-10 w-10 items-center justify-center rounded-lg border border-gold-300 bg-white text-gold-600 transition-all duration-300 hover:bg-gold-50 active:scale-95">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    @else
                        <span class="flex h-10 w-10 cursor-not-allowed items-center justify-center rounded-lg border border-gray-200 bg-gray-50 text-gray-400 transition-all duration-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </nav>
@endif
