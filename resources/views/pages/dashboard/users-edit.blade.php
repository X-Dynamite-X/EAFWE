{{-- Edit User Page --}}
<x-layout.dashboard title="{{ __('dashboard.users.edit_title') }}">
    <div class="max-w-2xl mx-auto">
        <x-ui.card title="{{ __('dashboard.users.section_title') }}">
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="grid md:grid-cols-2 gap-4">
                    <x-ui.input name="name" label="{{ __('dashboard.users.form.name') }}" placeholder="John Doe"
                        value="{{ old('name', $user->name) }}" required />

                    <x-ui.input type="email" name="email" label="{{ __('dashboard.users.form.email') }}"
                        placeholder="user@example.com" value="{{ old('email', $user->email) }}" required />
                </div>

                <x-ui.input name="phone" label="{{ __('dashboard.users.form.phone') }}" placeholder="+966 50 000 0000"
                    value="{{ old('phone', $user->phone) }}" />

                <x-ui.select name="role" label="{{ __('dashboard.users.form.role') }}" :options="[
                    'admin' => __('dashboard.users.roles.admin'),
                    'staff' => __('dashboard.users.roles.staff'),
                    'member' => __('dashboard.users.roles.member'),
                ]"
                    value="{{ old('role', $user->roles->first()?->name) }}" required />

                <div class="mb-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" class="w-4 h-4 rounded border-gray-300"
                            {{ $user->is_active ? 'checked' : '' }}>
                        <span class="mr-2 text-sm text-gray-700">{{ __('dashboard.users.form.is_active') }}</span>
                    </label>
                </div>

                <div class="flex gap-4 mt-6">
                    <x-ui.button type="submit" color="gold" class="flex-1 text-center">
                        {{ __('dashboard.users.form.save_changes') }}
                    </x-ui.button>
                    <x-ui.button href="{{ route('users.index') }}" color="gray" class="flex-1 text-center">
                        {{ __('common.actions.cancel') }}
                    </x-ui.button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layout.dashboard>
