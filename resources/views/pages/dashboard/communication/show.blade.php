<x-layout.dashboard title="عرض الاتصال">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <x-ui.card>
                <div class="flex justify-between items-start mb-6 pb-6 border-b border-gray-200">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">{{ $communication->title }}</h1>
                        <p class="text-gray-600 mt-2">
                            <i class="fas fa-calendar"></i>
                            {{ $communication->published_date ? $communication->published_date->format('d/m/Y') : 'بدون تاريخ' }}
                        </p>
                    </div>
                    @can('manage communications')
                    <div class="flex gap-2">
                        <x-ui.button href="{{ route('dashboard.communication.edit', $communication) }}" color="primary" size="sm">
                            <i class="fas fa-edit"></i> تعديل
                        </x-ui.button>
                        <button type="button" onclick="openDeleteModal('{{ $communication->id }}', '{{ $communication->title }}', '{{ route('dashboard.communication.destroy', $communication) }}')" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded text-sm transition-colors">
                            <i class="fas fa-trash"></i> حذف
                        </button>
                    </div>
                    @endcan
                </div>

                <div class="flex flex-wrap gap-3 mb-6">
                    <x-ui.badge color="{{ $communication->type == 'announcement' ? 'blue' : ($communication->type == 'newsletter' ? 'cyan' : 'green') }}">
                        @switch($communication->type)
                            @case('announcement')
                                إعلان
                            @break
                            @case('newsletter')
                                نشرة
                            @break
                            @case('notification')
                                إشعار
                            @break
                        @endswitch
                    </x-ui.badge>
                    @if($communication->is_pinned)
                    <x-ui.badge color="yellow">
                        <i class="fas fa-thumbtack text-xs"></i> مثبت
                    </x-ui.badge>
                    @endif
                    <x-ui.badge color="{{ $communication->is_active ? 'green' : 'red' }}">
                        {{ $communication->is_active ? 'نشط' : 'معطل' }}
                    </x-ui.badge>
                </div>

                <div class="prose prose-sm max-w-none text-gray-700 leading-relaxed">
                    {!! $communication->message !!}
                </div>

                <div class="mt-6 pt-6 border-t border-gray-200">
                    <p class="text-xs text-gray-500">
                        <i class="fas fa-clock"></i>
                        تم الإنشاء: {{ $communication->created_at->format('d/m/Y H:i') }}
                        @if($communication->updated_at != $communication->created_at)
                        | تم التحديث: {{ $communication->updated_at->format('d/m/Y H:i') }}
                        @endif
                    </p>
                </div>
            </x-ui.card>

            <x-ui.button href="{{ route('dashboard.communication.index') }}" color="gray" class="mt-4">
                <i class="fas fa-arrow-right"></i> العودة
            </x-ui.button>
        </div>

        <div>
            <x-ui.card>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">معلومات الإعلان</h3>

                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-600">النوع</dt>
                        <dd class="text-gray-900 mt-1">
                            @switch($communication->type)
                                @case('announcement')
                                    <x-ui.badge color="blue">إعلان</x-ui.badge>
                                @break
                                @case('newsletter')
                                    <x-ui.badge color="cyan">نشرة</x-ui.badge>
                                @break
                                @case('notification')
                                    <x-ui.badge color="green">إشعار</x-ui.badge>
                                @break
                            @endswitch
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-600">الحالة</dt>
                        <dd class="text-gray-900 mt-1">
                            <x-ui.badge color="{{ $communication->is_active ? 'green' : 'red' }}">
                                {{ $communication->is_active ? 'نشط' : 'معطل' }}
                            </x-ui.badge>
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-600">مثبت</dt>
                        <dd class="text-gray-900 mt-1">
                            {{ $communication->is_pinned ? 'نعم' : 'لا' }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-600">تاريخ النشر</dt>
                        <dd class="text-gray-900 mt-1">
                            {{ $communication->published_date ? $communication->published_date->format('d/m/Y') : '-' }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-600">الترتيب</dt>
                        <dd class="text-gray-900 mt-1">{{ $communication->order }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-600">Slug</dt>
                        <dd class="text-gray-900 mt-1 text-xs font-mono">{{ $communication->slug }}</dd>
                    </div>
                </dl>
            </x-ui.card>
        </div>
    </div>
</x-layout.dashboard>

@include('components.delete-modal')
