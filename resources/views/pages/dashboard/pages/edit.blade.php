<x-layout.dashboard>
    <x-ui.section-header>
        <x-slot name="title">
            Edit Page
        </x-slot>
    </x-ui.section-header>

    <x-ui.card>
        <form action="{{ route('dashboard.pages.update', $page) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="space-y-4">
                <div>
                    <x-ui.input name="title" label="Title" :value="$page->title" required />
                </div>
                <div>
                    <x-ui.input name="slug" label="Slug" :value="$page->slug" required />
                </div>
                <div>
                    <x-ui.textarea name="content" label="Content" :value="$page->content" required />
                </div>
                <div>
                    <x-ui.button type="submit" variant="primary">Update</x-ui.button>
                </div>
            </div>
        </form>
    </x-ui.card>
</x-layout.dashboard>
