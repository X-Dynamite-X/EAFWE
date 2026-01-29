<x-layout.dashboard title="{{ __('modules.pages.title') }}">
    <x-ui.section-header>
        <x-slot name="title">
            {{ __('modules.pages.title') }}
        </x-slot>
        <x-ui.button tag="a" href="{{ route('dashboard.pages.create') }}" variant="primary">
            <i class="fas fa-plus"></i> {{ __('modules.pages.create') }}
        </x-ui.button>
    </x-ui.section-header>

    <x-ui.table>
        <x-slot name="header">
            <x-ui.table.header>{{ __('modules.pages.fields.title') }}</x-ui.table.header>
            <x-ui.table.header>{{ __('modules.pages.fields.slug') }}</x-ui.table.header>
            <x-ui.table.header>{{ __('common.actions.actions') }}</x-ui.table.header>
        </x-slot>

        <x-slot name="body">
            @foreach ($pages as $page)
                <x-ui.table.row>
                    <x-ui.table.cell>{{ $page->title }}</x-ui.table.cell>
                    <x-ui.table.cell>{{ $page->slug }}</x-ui.table.cell>
                    <x-ui.table.cell>
                        <div class="flex gap-3">
                            <a href="{{ route('dashboard.pages.edit', $page) }}"
                                class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-edit"></i> {{ __('common.actions.edit') }}
                            </a>
                            <form action="{{ route('dashboard.pages.destroy', $page) }}" method="POST"
                                class="inline-block"
                                onsubmit="return confirm('{{ __('common.general.confirm_delete') }}')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i> {{ __('common.actions.delete') }}
                                </button>
                            </form>
                        </div>
                    </x-ui.table.cell>
                </x-ui.table.row>
            @endforeach
        </x-slot>
    </x-ui.table>
</x-layout.dashboard>
