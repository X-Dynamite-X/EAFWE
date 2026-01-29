{{-- Create Membership Page --}}
<x-layout.dashboard title="{{ __('dashboard.memberships.create.title') }}">
    <div class="max-w-2xl mx-auto">
        <x-ui.card title="{{ __('dashboard.memberships.create.section_title') }}">
            <form action="{{ route('memberships.store') }}" method="POST">
                @csrf

                <x-ui.select name="membership_type" label="{{ __('dashboard.memberships.create.type_label') }}"
                    :options="$membershipTypes" value="{{ old('membership_type') }}" required />

                <x-ui.select name="country" label="{{ __('dashboard.memberships.create.country_label') }}"
                    :options="$countries" value="{{ old('country') }}" required />

                <x-ui.input name="company_name"
                    label="{{ __('dashboard.memberships.create.company_label') }} ({{ __('common.form.optional') }})"
                    value="{{ old('company_name') }}" />

                <x-ui.textarea name="description" label="{{ __('dashboard.memberships.create.description_label') }}"
                    rows="5" placeholder="{{ __('dashboard.memberships.create.description_placeholder') }}"
                    value="{{ old('description') }}" required />

                <div class="flex gap-4 mt-6">
                    <x-ui.button type="submit" color="gold" class="flex-1 text-center">
                        {{ __('dashboard.memberships.create.submit') }}
                    </x-ui.button>
                    <x-ui.button href="{{ route('memberships.index') }}" color="gray" class="flex-1 text-center">
                        {{ __('common.actions.cancel') }}
                    </x-ui.button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layout.dashboard>
