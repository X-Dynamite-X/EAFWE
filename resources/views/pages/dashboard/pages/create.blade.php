<x-layout.dashboard>
    <x-ui.section-header>
        <x-slot name="title">
            Create Page
        </x-slot>
    </x-ui.section-header>

    <x-ui.card>
        <form action="{{ route('dashboard.pages.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <x-ui.input name="title" label="Title" required />
                </div>
                <div>
                    <x-ui.input name="slug" label="Slug" required />
                </div>
                <div>
                    <x-ui.textarea name="content" label="Content" required />
                </div>
                <div>
                    <x-ui.button type="submit" variant="primary">Create</x-ui.button>
                </div>
            </div>
        </form>
    </x-ui.card>
</x-layout.dashboard>
