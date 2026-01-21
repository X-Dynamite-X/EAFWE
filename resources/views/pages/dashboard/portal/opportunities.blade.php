<x-layout.dashboard title="بوابة الفرص">
    <div class="mb-8">
        <h1 class="text-3xl font-black text-charcoal-900 mb-2">بوابة الفرص لالاستثمارية وال{{ __('modules.training.categories.training') . 'ية'</h1>
        <p class="text-charcoal-600">اكتشفي فرصاً حصرية للعضوات للنمو والتوسع وتطوير المهارات.</p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
            $portal_opportunities = [
                [
                    'title' => 'فرصة {{ __('modules.participation.types.sponsor') }} مشروع ناشئ',
                    'cat' => '{{ __('modules.participation.types.sponsor') }} واستثمار',
                    'desc' => 'ت{{ __('common.actions.search') }} شركة استثمارية عن مشاريع نسائية في قطاع التقنية لل{{ __('modules.participation.types.sponsor') }} وال{{ __('modules.portal.opportunity_types.funding') }}.',
                    'icon' => '💎',
                ],
                [
                    'title' => '{{ __('common.time.from') . 'حة' {{ __('modules.training.categories.training') . 'ية': القيادة الرقمية',
                    'cat' => 'فرص {{ __('modules.training.categories.training') }}',
                    'desc' => '{{ __('common.time.from') . 'حة' مقدمة {{ __('common.time.from') }} جامعة عالمية لـ 5 عضوات متميزات.',
                    'icon' => '🎓',
                ],
                [
                    'title' => 'فرصة توريد - إكسبو دبي',
                    'cat' => 'فرص تجارية',
                    'desc' => 'دعوة لعضوات الجمعية لتقديم عروض أسعار لتوريد الهدايا التذكارية.',
                    'icon' => '🌍',
                ],
                [
                    'title' => 'برنامج تبادل خبرات - سنغافورة',
                    'cat' => 'فرص دولية',
                    'desc' => 'زيارة ميدانية لتعلم أفضل الممارسات في ريادة الأعمال النسائية.',
                    'icon' => '✈️',
                ],
            ];
        @endphp

        @foreach ($portal_opportunities as $opp)
            <x-ui.card>
                <div class="text-4xl mb-6">{{ $opp['icon'] }}</div>
                <span
                    class="text-[10px] font-black uppercase text-gold-600 mb-2 block tracking-widest">{{ $opp['cat'] }}</span>
                <h3 class="text-xl font-black text-charcoal-900 mb-4">{{ $opp['title'] }}</h3>
                <p class="text-sm text-charcoal-600 leading-relaxed mb-8">{{ $opp['desc'] }}</p>
                <x-ui.button class="w-full" size="sm" variant="outline">اكتشفي المزيد</x-ui.button>
            </x-ui.card>
        @endforeach
    </div>
</x-layout.dashboard>
