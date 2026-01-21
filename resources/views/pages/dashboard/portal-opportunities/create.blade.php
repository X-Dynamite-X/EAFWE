<x-layout.dashboard title="{{ __('common.actions.add') }} فرصة جديدة">
    <div class="max-w-2xl mx-auto">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-cyan-50 to-blue-50 rounded-lg shadow-sm p-6 border border-cyan-100 mb-6">
            <div class="flex items-center gap-4">
                <div class="p-3 bg-cyan-100 rounded-lg">
                    <i class="fas fa-plus-circle text-cyan-600 text-xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-900">{{ __('common.actions.add') }} فرصة جديدة</h1>
                    <p class="text-gray-600 text-sm md:text-base mt-1">ملأ ال{{ __('modules.marketing.resource_types.template') }} أدناه ل{{ __('common.actions.create') }} فرصة {{ __('modules.portal.opportunity_types.funding') }} أو {{ __('modules.participation.types.partner') }} جديدة
                    </p>
                </div>
            </div>
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
            <form action="{{ route('dashboard.portal-opportunities.store') }}" method="POST"
                enctype="multipart/form-data" class="space-y-4">
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
                            <label class="block text-sm font-medium text-gray-900 mb-2">{{ __('common.general.title') }} (ب{{ __('common.tabs.arabic') }}) <span
                                    class="text-red-600">*</span></label>
                            <input type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                name="title_ar" value="{{ old('title_ar') }}" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">{{ __('common.general.description') }} (ب{{ __('common.tabs.arabic') }}) <span
                                    class="text-red-600">*</span></label>
                            <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                name="description_ar" rows="3" required>{{ old('description_ar') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">المحتوى (ب{{ __('common.tabs.arabic') }}) <span
                                    class="text-red-600">*</span></label>
                            <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" name="content_ar"
                                rows="6" required>{{ old('content_ar') }}</textarea>
                        </div>
                    </div>

                    {{-- English Fields --}}
                    <div x-show="lang === 'en'" class="space-y-4" style="display: none;">
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2 text-left" dir="ltr">Title
                                (English) <span class="text-red-600">*</span></label>
                            <input type="text" dir="ltr"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                name="title_en" value="{{ old('title_en') }}" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2 text-left"
                                dir="ltr">Description (English) <span class="text-red-600">*</span></label>
                            <textarea dir="ltr" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                name="description_en" rows="3" required>{{ old('description_en') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2 text-left" dir="ltr">Content
                                (English) <span class="text-red-600">*</span></label>
                            <textarea dir="ltr" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                name="content_en" rows="6" required>{{ old('content_en') }}</textarea>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">المعرف (Slug) <span
                            class="text-red-600">*</span></label>
                    <input type="text"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('slug') border-red-500 @enderror"
                        name="slug" value="{{ old('slug') }}" required>
                    @error('slug')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">نوع الفرصة <span
                                class="text-red-600">*</span></label>
                        <select
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                            name="opportunity_type" required>
                            <option value="">{{ __('common.form.select_option') }}</option>
                            <option value="business" {{ old('opportunity_type') == 'business' ? 'selected' : '' }}>عمل
                                تجاري</option>
                            <option value="partnership"
                                {{ old('opportunity_type') == 'partnership' ? 'selected' : '' }}>{{ __('modules.participation.types.partner') }}</option>
                            <option value="funding" {{ old('opportunity_type') == 'funding' ? 'selected' : '' }}>{{ __('modules.portal.opportunity_types.funding') }}
                            </option>
                        </select>
                        @error('opportunity_type')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">الحالة <span
                                class="text-red-600">*</span></label>
                        <select
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                            name="status" required>
                            <option value="">{{ __('common.form.select_option') }}</option>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>{{ __('common.status.active') }}</option>
                            <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>{{ __('modules.portal.statuses.closed') }}</option>
                            <option value="upcoming" {{ old('status') == 'upcoming' ? 'selected' : '' }}>{{ __('modules.portal.statuses.upcoming') }}
                            </option>
                        </select>
                        @error('status')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">{{ __('common.general.image') }}</label>
                        <div id="dropZone"
                            class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition"
                            style="min-height: 120px; display: flex; align-items: center; justify-content: center;">
                            <div>
                                <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                <p class="text-gray-600 text-sm">اسحب {{ __('common.general.image') }} هنا أو انقر للاختيار</p>
                                <p class="text-gray-500 text-xs mt-1">JPEG, PNG, GIF, WebP - حد أقصى 5MB</p>
                            </div>
                            <input type="file" id="image" name="image"
                                accept="image/jpeg,image/png,image/gif,image/webp" style="display: none;">
                        </div>
                        @error('image')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p id="fileName" class="text-green-600 text-sm mt-2" style="display: none;"></p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">{{ __('common.general.order') }}</label>
                        <input type="number"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                            name="order" value="{{ old('order', 0) }}" min="0">
                    </div>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" class="w-4 h-4 rounded" name="is_active" value="1"
                        {{ old('is_active') ? 'checked' : '' }}>
                    <label class="mr-2 text-sm text-gray-900">نشر الفرصة</label>
                </div>

                <div class="flex gap-3 mt-6 pt-6 border-t border-gray-200">
                    <x-ui.button type="submit" color="primary"><i class="fas fa-save"></i> {{ __('common.actions.save') }}</x-ui.button>
                    <x-ui.button href="{{ route('portal-opportunities.manage') }}" color="gray"><i
                            class="fas fa-times"></i> {{ __('common.actions.cancel') }}</x-ui.button>
                </div>
            </form>
        </x-ui.card>
    </div>

    <script>
        document.getElementById('title_ar').addEventListener('input', function(e) {
            const slug = e.target.value.toLowerCase().trim().replace(/[^\w\s-]/g, '').replace(/[\s_]+/g, '-')
                .replace(/^-+|-+$/g, '');
            document.querySelector('[name="slug"]').value = slug;
        });

        const dropZone = document.getElementById('dropZone');
        const fileInput = document.getElementById('image');
        const fileName = document.getElementById('fileName');

        dropZone.addEventListener('click', () => fileInput.click());

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('border-blue-500', 'bg-blue-50');
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('border-blue-500', 'bg-blue-50');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-blue-500', 'bg-blue-50');
            if (e.dataTransfer.files.length > 0) {
                fileInput.files = e.dataTransfer.files;
                updateFileName();
            }
        });

        fileInput.addEventListener('change', updateFileName);

        function updateFileName() {
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                const sizeMB = (file.size / (1024 * 1024)).toFixed(2);
                fileName.textContent = `✓ ${file.name} (${sizeMB} MB)`;
                fileName.style.display = 'block';
            } else {
                fileName.style.display = 'none';
            }
        }
    </script>
</x-layout.dashboard>
