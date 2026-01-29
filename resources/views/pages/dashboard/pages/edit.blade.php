<x-layout.dashboard title="{{ __('modules.pages.edit') }}">
    <x-ui.section-header>
        <x-slot name="title">
            {{ __('modules.pages.edit') }}
        </x-slot>
    </x-ui.section-header>

    <x-ui.card>
        <form action="{{ route('dashboard.pages.update', $page) }}" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')
            <div>
                <x-ui.input name="title" label="{{ __('modules.pages.fields.title') }}"
                    value="{{ old('title', $page->title) }}" required />
            </div>
            <div>
                <x-ui.input name="slug" label="{{ __('modules.pages.fields.slug') }}"
                    value="{{ old('slug', $page->slug) }}" required />
            </div>
            <div>
                <x-ui.textarea name="content" label="{{ __('modules.pages.fields.content') }}" required>
                    {{ old('content', $page->content) }}
                </x-ui.textarea>
            </div>
            <div class="flex gap-3 pt-4 border-t border-gray-100">
                <x-ui.button type="submit" variant="primary">
                    <i class="fas fa-save"></i> {{ __('common.actions.update') }}
                </x-ui.button>
                <x-ui.button tag="a" href="{{ route('dashboard.pages.index') }}" variant="secondary">
                    <i class="fas fa-times"></i> {{ __('common.actions.cancel') }}
                </x-ui.button>
            </div>
        </form>
    </x-ui.card>
</x-layout.dashboard>
