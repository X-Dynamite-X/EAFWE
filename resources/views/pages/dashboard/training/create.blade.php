<x-layout.dashboard :title="__('modules.training.create')">
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">{{ __('modules.training.create') }}</h1>
            <p class="text-gray-600 mt-1">
                {{ __('modules.training.subtitle', ['default' => 'ملأ ال{{ __('modules.marketing.resource_types.template') }} أدناه ل{{ __('common.actions.create') }} برنامج {{ __('modules.training.categories.training') }} جديد']) }}</p>
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
            <form action="{{ route('dashboard.training.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
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
                                <i class="fas fa-heading"></i> {{ __('common.general.title') }} (ب{{ __('common.tabs.arabic') }}) <span class="text-red-600">*</span>
                            </label>
                            <input type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                id="title_ar" name="title_ar" value="{{ old('title_ar') }}"
                                placeholder="عنوان البرنامج ب{{ __('common.tabs.arabic') }}" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                <i class="fas fa-align-left"></i> {{ __('common.general.description') }} (ب{{ __('common.tabs.arabic') }}) <span class="text-red-600">*</span>
                            </label>
                            <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                name="description_ar" rows="3" placeholder="وصف موجز ب{{ __('common.tabs.arabic') }}" required>{{ old('description_ar') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">
                                <i class="fas fa-file-alt"></i> المحتوى (ب{{ __('common.tabs.arabic') }}) <span class="text-red-600">*</span>
                            </label>
                            <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" name="content_ar"
                                rows="6" placeholder="محتوى البرنامج ب{{ __('common.tabs.arabic') }}" required>{{ old('content_ar') }}</textarea>
                        </div>
                    </div>

                    {{-- English Fields --}}
                    <div x-show="lang === 'en'" class="space-y-4" style="display: none;">
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2 text-left" dir="ltr">
                                <i class="fas fa-heading"></i> Title (English) <span class="text-red-600">*</span>
                            </label>
                            <input type="text" dir="ltr"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                name="title_en" value="{{ old('title_en') }}" placeholder="Program Title" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2 text-left" dir="ltr">
                                <i class="fas fa-align-left"></i> Description (English) <span
                                    class="text-red-600">*</span>
                            </label>
                            <textarea dir="ltr" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                name="description_en" rows="3" placeholder="Short description" required>{{ old('description_en') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2 text-left" dir="ltr">
                                <i class="fas fa-file-alt"></i> Content (English) <span class="text-red-600">*</span>
                            </label>
                            <textarea dir="ltr" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                name="content_en" rows="6" placeholder="Program content" required>{{ old('content_en') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-900 mb-2">
                            <i class="fas fa-tags"></i> {{ __('common.general.type') }} <span class="text-red-600">*</span>
                        </label>
                        <select
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                            id="category" name="category" required>
                            <option value="">{{ __('common.form.select_option') }}</option>
                            <option value="training" {{ old('category') == 'training' ? 'selected' : '' }}>{{ __('modules.training.categories.training') }}
                            </option>
                            <option value="workshop" {{ old('category') == 'workshop' ? 'selected' : '' }}>{{ __('modules.training.categories.workshop') }}
                            </option>
                            <option value="seminar" {{ old('category') == 'seminar' ? 'selected' : '' }}>{{ __('modules.training.categories.seminar') }}</option>
                        </select>
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-900 mb-2">
                            <i class="fas fa-image"></i> {{ __('common.general.image') }}
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-blue-500 transition"
                            id="dropZone">
                            <input type="file" class="hidden" id="image" name="image"
                                accept="image/jpeg,image/png,image/gif,image/webp">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                            <p class="text-gray-900 font-medium">اسحب {{ __('common.general.image') }} هنا أو اضغط للاختيار</p>
                            <p class="text-sm text-gray-600 mt-1">الحد الأقصى: 5 ميجابايت</p>
                            <p class="text-xs text-gray-500 mt-2" id="fileName"></p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" class="w-4 h-4 rounded" id="is_active" name="is_active" value="1"
                        {{ old('is_active') ? 'checked' : '' }}>
                    <label class="mr-2 text-sm text-gray-900" for="is_active">نشر البرنامج</label>
                </div>

                <div class="flex gap-3 mt-6 pt-6 border-t border-gray-200">
                    <x-ui.button type="submit" color="primary"><i class="fas fa-save"></i> {{ __('common.actions.save') }}
                        البرنامج</x-ui.button>
                    <x-ui.button href="{{ route('dashboard.training.manage') }}" color="gray"><i
                            class="fas fa-times"></i> {{ __('common.actions.cancel') }}</x-ui.button>
                </div>
            </form>
        </x-ui.card>
    </div>

    <script>
        document.getElementById('title_ar').addEventListener('input', function(e) {
            const slug = e.target.value.toLowerCase().trim().replace(/[^\w\s-]/g, '').replace(/[\s_]+/g, '-')
                .replace(/^-+|-+$/g, '');
            document.getElementById('slug').value = slug;
        });

        // File upload with drag and drop
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
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
                updateFileName();
            }
        });

        fileInput.addEventListener('change', updateFileName);

        function updateFileName() {
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                const sizeMB = (file.size / 1024 / 1024).toFixed(2);
                fileName.textContent = `{{ __('common.general.image') }} المختارة: ${file.name} (${sizeMB} ميجابايت)`;
            } else {
                fileName.textContent = '';
            }
        }
    </script>

</x-layout.dashboard>
