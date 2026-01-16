<x-layout.dashboard>
    <x-ui.section-header>
        <x-slot name="title">
            Pages Management
        </x-slot>
        <x-ui.button tag="a" href="{{ route('dashboard.pages.create') }}" variant="primary">Create Page</x-ui.button>
    </x-ui.section-header>

    <x-ui.table>
        <x-slot name="header">
            <x-ui.table.header>Title</x-ui.table.header>
            <x-ui.table.header>Slug</x-ui.table.header>
            <x-ui.table.header>Actions</x-ui.table.header>
        </x-slot>

        <x-slot name="body">
            @foreach($pages as $page)
                <x-ui.table.row>
                    <x-ui.table.cell>{{ $page->title }}</x-ui.table.cell>
                    <x-ui.table.cell>{{ $page->slug }}</x-ui.table.cell>
                    <x-ui.table.cell>
                        <a href="{{ route('dashboard.pages.edit', $page) }}" class="text-blue-600">Edit</a>
                        <form action="{{ route('dashboard.pages.destroy', $page) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Delete</button>
                        </form>
                    </x-ui.table.cell>
                </x-ui.table.row>
            @endforeach
        </x-slot>
    </x-ui.table>

</x-layout.dashboard>
