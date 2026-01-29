<x-layout.dashboard title="{{ __('modules.communication.create') }}">
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">{{ __('modules.communication.create') }}</h1>
            <p class="text-gray-600 mt-1">{{ __('common.form.fill') }}
                {{ __('modules.marketing.resource_types.template') }} {{ __('common.time.to') }}
                {{ __('common.actions.add') }} {{ __('modules.communication.types.announcement') }}
                {{ __('common.form.or') }} {{ __('modules.communication.types.newsletter') }}</p>
        </div>

        @if ($errors->any())
            <x-ui.alert type="danger" class="mb-6">
                <strong>{{ __('common.general.error') }} في البيانات المدخلة:</strong>
                <ul class="mt-2 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-ui.alert>
        @endif

        <x-ui.card>
            <form action="{{ route('dashboard.communication.store') }}" method="POST" class="space-y-4">
                @csrf

                <div x-data="{ lang: 'ar' }">
                    <div class="flex gap-2 mb-4 border-b border-gray-200">
                        <button type="button" @click="lang = 'ar'" class="px-4 py-2 text-sm font-medium"
                            :class="lang === 'ar' ? 'bg-gold-500 text-charcoal-900 rounded-t-lg' :
                                'text-gray-500 hover:text-gray-700'">
                            {{ __('common.tabs.arabic') }}
                        </button>
                        <button type="button" @click="lang = 'en'" class="px-4 py-2 text-sm font-medium"
                            :class="lang === 'en' ? 'bg-gold-500 text-charcoal-900 rounded-t-lg' :
                                'text-gray-500 hover:text-gray-700'">
                            English
                        </button>
                    </div>

                    {{-- Arabic Fields --}}
                    <div x-show="lang === 'ar'" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                <i class="fas fa-heading"></i> {{ __('common.general.title') }}
                                (ب{{ __('common.tabs.arabic') }})
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="text"
                                class="w-full px-4 py-2 border {{ $errors->has('title_ar') ? 'border-red-500' : 'border-gray-300' }} rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                id="title_ar" name="title_ar" value="{{ old('title_ar') }}"
                                placeholder="أدخل {{ __('common.general.title') }} ب{{ __('common.tabs.arabic') }}"
                                required>
                            @error('title_ar')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                <i class="fas fa-file-alt"></i> {{ __('modules.communication.fields.message_ar') }}
                                <span class="text-red-600">*</span>
                            </label>
                            <textarea
                                class="w-full px-4 py-2 border {{ $errors->has('message_ar') ? 'border-red-500' : 'border-gray-300' }} rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                name="message_ar" rows="6"
                                placeholder="{{ __('common.form.placeholder.enter') }} {{ __('modules.communication.fields.message_ar') }}"
                                required>{{ old('message_ar') }}</textarea>
                            @error('message_ar')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- English Fields --}}
                    <div x-show="lang === 'en'" class="space-y-4" style="display: none;">
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2 text-left" dir="ltr">
                                <i class="fas fa-heading"></i> {{ __('modules.communication.fields.title_en') }}
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="text" dir="ltr"
                                class="w-full px-4 py-2 border {{ $errors->has('title_en') ? 'border-red-500' : 'border-gray-300' }} rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                name="title_en" value="{{ old('title_en') }}"
                                placeholder="{{ __('common.form.placeholder.enter') }} {{ __('modules.communication.fields.title_en') }}"
                                required>
                            @error('title_en')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2 text-left" dir="ltr">
                                <i class="fas fa-file-alt"></i> {{ __('modules.communication.fields.message_en') }}
                                <span class="text-red-600">*</span>
                            </label>
                            <textarea dir="ltr"
                                class="w-full px-4 py-2 border {{ $errors->has('message_en') ? 'border-red-500' : 'border-gray-300' }} rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                name="message_en" rows="6"
                                placeholder="{{ __('common.form.placeholder.enter') }} {{ __('modules.communication.fields.message_en') }}"
                                required>{{ old('message_en') }}</textarea>
                            @error('message_en')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-900 mb-2">
                        <i class="fas fa-link"></i> {{ __('modules.communication.fields.slug') }}
                        <span class="text-red-600">*</span>
                    </label>
                    <input type="text"
                        class="w-full px-4 py-2 border {{ $errors->has('slug') ? 'border-red-500' : 'border-gray-300' }} rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="slug" name="slug" value="{{ old('slug') }}" placeholder="announcement-name"
                        required dir="ltr">
                    <p class="text-gray-500 text-sm mt-1">{{ __('common.hints.slug') }}</p>
                    @error('slug')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-900 mb-2">
                            <i class="fas fa-tags"></i> {{ __('common.general.type') }}
                            <span class="text-red-600">*</span>
                        </label>
                        <select
                            class="w-full px-4 py-2 border {{ $errors->has('type') ? 'border-red-500' : 'border-gray-300' }} rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            id="type" name="type" required>
                            <option value="">-- اختر {{ __('common.general.type') }} --</option>
                            <option value="announcement" {{ old('type') == 'announcement' ? 'selected' : '' }}>
                                {{ __('modules.communication.types.announcement') }}
                            </option>
                            <option value="newsletter" {{ old('type') == 'newsletter' ? 'selected' : '' }}>
                                {{ __('modules.communication.types.newsletter') }} بريدية
                            </option>
                            <option value="notification" {{ old('type') == 'notification' ? 'selected' : '' }}>
                                {{ __('modules.communication.types.notification') }}
                            </option>
                        </select>
                        @error('type')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="published_date" class="block text-sm font-medium text-gray-900 mb-2">
                            <i class="fas fa-calendar"></i> {{ __('modules.communication.fields.published_date') }}
                        </label>
                        <input type="date"
                            class="w-full px-4 py-2 border {{ $errors->has('published_date') ? 'border-red-500' : 'border-gray-300' }} rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            id="published_date" name="published_date" value="{{ old('published_date') }}">
                        @error('published_date')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex items-center">
                        <input type="checkbox" class="w-4 h-4 rounded" id="is_active" name="is_active"
                            value="1" {{ old('is_active') ? 'checked' : '' }}>
                        <label class="mr-2 text-sm text-gray-900" for="is_active">
                            <i class="fas fa-check-circle"></i> {{ __('modules.communication.fields.is_active') }}
                        </label>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" class="w-4 h-4 rounded" id="is_pinned" name="is_pinned"
                            value="1" {{ old('is_pinned') ? 'checked' : '' }}>
                        <label class="mr-2 text-sm text-gray-900" for="is_pinned">
                            <i class="fas fa-thumbtack"></i> {{ __('modules.communication.fields.is_pinned') }}
                        </label>
                    </div>
                </div>

                <div>
                    <label for="order" class="block text-sm font-medium text-gray-900 mb-2">
                        <i class="fas fa-sort-numeric-up"></i> {{ __('modules.communication.fields.order') }}
                    </label>
                    <input type="number"
                        class="w-full px-4 py-2 border {{ $errors->has('order') ? 'border-red-500' : 'border-gray-300' }} rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        id="order" name="order" value="{{ old('order', 0) }}" min="0">
                    <p class="text-gray-500 text-sm mt-1">{{ __('common.hints.order') }}</p>
                    @error('order')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3 mt-6 pt-6 border-t border-gray-200">
                    <x-ui.button type="submit" color="primary">
                        <i class="fas fa-save"></i> {{ __('common.actions.save') }}
                    </x-ui.button>
                    <x-ui.button href="{{ route('dashboard.communication.manage') }}" color="gray">
                        <i class="fas fa-times"></i> {{ __('common.actions.cancel') }}
                    </x-ui.button>
                </div>
            </form>
        </x-ui.card>
    </div>

    <script>
        document.getElementById('title_ar').addEventListener('input', function(e) {
            const slug = e.target.value
                .toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_]+/g, '-')
                .replace(/^-+|-+$/g, '');
            document.getElementById('slug').value = slug;
        });
    </script>
</x-layout.dashboard>
