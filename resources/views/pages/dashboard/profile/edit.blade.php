<x-layout.dashboard title="{{ __('dashboard.profile.title') }}" subtitle="{{ __('dashboard.profile.subtitle') }}">
    @if (session('success'))
        <x-alerts.success>{{ session('success') }}</x-alerts.success>
    @endif

    @if ($errors->any())
        <x-alerts.error>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alerts.error>
    @endif

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="grid md:grid-cols-2 gap-8 mb-8">
                {{-- Basic Info --}}
                <div class="space-y-6">
                    <h3 class="text-lg font-black text-charcoal-900 border-b border-gray-100 pb-2">
                        {{ __('dashboard.profile.basic_info') }}</h3>
                    <x-ui.input type="text" name="name" label="{{ __('dashboard.profile.full_name') }}"
                        value="{{ old('name', $user->name) }}" required
                        placeholder="{{ __('dashboard.profile.placeholder.name') }}" />

                    <x-ui.input type="email" name="email" label="{{ __('common.general.email') }}"
                        value="{{ old('email', $user->email) }}" required />

                    <x-ui.input type="text" name="phone" label="{{ __('common.general.phone') }}"
                        placeholder="+971 50 000 0000" value="{{ old('phone', $user->phone) }}" />
                </div>

                {{-- Membership Info --}}
                <div class="space-y-6">
                    <h3 class="text-lg font-black text-charcoal-900 border-b border-gray-100 pb-2">
                        {{ __('dashboard.profile.membership_info') }}</h3>

                    @if ($membership)
                        <div class="bg-gold-50 p-6 rounded-2xl border border-gold-100">
                            <div class="flex justify-between items-start mb-6">
                                <div>
                                    <p class="text-xs text-gold-600 font-bold mb-1">
                                        {{ __('dashboard.profile.membership_type') }}</p>
                                    <p class="font-black text-charcoal-900">
                                        @switch($membership->membership_type)
                                            @case('basic')
                                                {{ __('member.membership_types.basic') }}
                                            @break

                                            @case('premium')
                                                {{ __('member.membership_types.premium') }}
                                            @break

                                            @case('enterprise')
                                                {{ __('member.membership_types.enterprise') }}
                                            @break

                                            @default
                                                {{ $membership->membership_type }}
                                        @endswitch
                                    </p>
                                </div>
                                <span
                                    class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-[10px] font-black uppercase tracking-wider">{{ __('common.status.approved') }}
                                    ✅</span>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div>
                                    <p class="text-[10px] text-gray-500 font-bold mb-1">
                                        {{ __('dashboard.profile.join_date') }}</p>
                                    <p class="text-xs font-black text-charcoal-900">
                                        {{ $membership->approval_date?->format('d M Y') ?? '---' }}</p>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-500 font-bold mb-1">
                                        {{ __('dashboard.profile.renewal_date') }}</p>
                                    <p class="text-xs font-black text-charcoal-900">
                                        {{ $membership->approval_date?->addYears(1)->format('d M Y') ?? '---' }}</p>
                                </div>
                            </div>

                            <x-ui.button variant="outline" size="sm" class="w-full bg-white"
                                href="{{ route('member-card.download', $membership->id) }}">
                                <span class="flex items-center justify-center gap-2">
                                    <span>📥</span> {{ __('dashboard.profile.download_card') }}
                                </span>
                            </x-ui.button>

                            <button type="button"
                                class="w-full text-center mt-4 text-xs font-black text-gold-600 hover:text-gold-700">{{ __('dashboard.profile.request_renewal') }}</button>
                        </div>
                    @else
                        <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100">
                            <p class="text-charcoal-600 text-sm text-center">
                                {{ __('member.profile.pending_review') }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex gap-4">
                <x-ui.button type="submit" color="gold" class="flex-1 text-center">
                    {{ __('dashboard.profile.save_changes') }}
                </x-ui.button>
                <x-ui.button href="{{ route('dashboard') }}" color="gray" class="flex-1 text-center">
                    {{ __('common.actions.cancel') }}
                </x-ui.button>
            </div>
        </form>
    </div>
</x-layout.dashboard>
