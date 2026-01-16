<x-layout.dashboard>
    <x-ui.section-header>
        <x-slot name="title">
            {{ $page->title }}
        </x-slot>
    </x-ui.section-header>

    <div class="p-6">
        {!! $page->content !!}
    </div>
</x-layout.dashboard>
