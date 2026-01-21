<x-layout.dashboard title="{{ __('modules.participation.title') }}">
    <div class="mb-8">
        <h1 class="text-3xl font-black text-charcoal-900 mb-2">{{ __('modules.participation.title') }} في الفعاليات</h1>
        <p class="text-charcoal-600">ترشحي للمشاركة في المعارض والمؤتمرات والوفود الرسمية المحلية والدولية.</p>
    </div>

    <div class="grid lg:grid-cols-2 gap-8">
        @php
            $opportunities = [
                [
                    'title' => 'م{{ __('common.actions.view') }} "صنع في الإمارات" 2026',
                    'type' => 'م{{ __('common.actions.view') }} محلي',
                    'location' => 'مركز أدنيك - أبوظبي',
                    'date' => '15 - 20 مارس 2026',
                    'deadline' => '01 فبراير 2026',
                    'desc' => 'أكبر تجمع للصناعات ولالابتكارات الوطنية. تتوفر {{ __('common.time.from') . 'صات' خاصة لعضوات الجمعية ل{{ __('common.actions.view') }} {{ __('common.time.from') . 'تجاتهن'.',
                    'color' => 'blue',
                ],
                [
                    'title' => '{{ __('common.time.from') . 'تدى' المرأة العالمي - باريس',
                    'type' => 'وفد رسمي دولي',
                    'location' => 'باريس - فرنسا',
                    'date' => '10 - 14 يونيو 2026',
                    'deadline' => '15 مارس 2026',
                    'desc' =>
                        'فرصة للانضمام للوفد الرسمي للجمعية للمشاركة في هذا الحدث العالمي وتبادل الخبرات مع رائدات أعمال {{ __('common.time.from') }} مختلف دول العالم.',
                    'color' => 'purple',
                ],
                [
                    'title' => 'مؤتمر ريادة الأعمال والذكاء لالاصطناعي',
                    'type' => 'مؤتمر متخصص',
                    'location' => 'فندق قصر الإمارات - أبوظبي',
                    'date' => '05 مايو 2026',
                    'deadline' => '20 أبريل 2026',
                    'desc' => 'دعوة للعضوات للمشاركة كمتحدثات و{{ __('common.time.from') . 'اقشة' دور التقنية في مشاريع المستقبل.',
                    'color' => 'green',
                ],
            ];
        @endphp

        @foreach ($opportunities as $opp)
            <x-ui.card>
                <div class="flex flex-col h-full">
                    <div class="flex items-center justify-between mb-6">
                        <span
                            class="px-4 py-1 bg-{{ $opp['color'] }}-50 text-{{ $opp['color'] }}-600 rounded-full text-xs font-black">
                            {{ $opp['type'] }}
                        </span>
                        <div class="text-xs text-red-500 font-bold">
                            آخر موعد: {{ $opp['deadline'] }}
                        </div>
                    </div>
                    <h3 class="text-2xl font-black text-charcoal-900 mb-4">{{ $opp['title'] }}</h3>
                    <p class="text-charcoal-700 mb-6 leading-relaxed grow">{{ $opp['desc'] }}</p>

                    <div class="space-y-3 mb-8 text-sm">
                        <div class="flex items-center gap-2 text-charcoal-500">
                            <span>📍</span>
                            <span>{{ $opp['location'] }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-charcoal-500">
                            <span>📅</span>
                            <span>{{ $opp['date'] }}</span>
                        </div>
                    </div>

                    <div class="mt-auto grid grid-cols-2 gap-4">
                        <x-ui.button variant="outline" class="w-full">{{ __('common.general.details') }}</x-ui.button>
                        <x-ui.button class="w-full">تقديم طلب ترشح</x-ui.button>
                    </div>
                </div>
            </x-ui.card>
        @endforeach
    </div>
</x-layout.dashboard>
