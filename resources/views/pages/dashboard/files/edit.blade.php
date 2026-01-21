<x-layout.dashboard title="{{ __('common.actions.edit') }} {{ __('common.general.file') }}">
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">{{ __('common.actions.edit') }} {{ __('common.general.file') }}</h1>
            <p class="text-gray-600 mt-1">قم بتحديث معلومات {{ __('common.general.file') }} أدناه</p>
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
            <form action="{{ route('dashboard.files.update', $file) }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                @method('PATCH')

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
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('title_ar') border-red-500 @enderror"
                                name="title_ar" value="{{ old('title_ar', $file->title_ar) }}" required>
                            @error('title_ar')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">{{ __('common.general.description') }} (ب{{ __('common.tabs.arabic') }})</label>
                            <textarea
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('description_ar') border-red-500 @enderror"
                                name="description_ar" rows="3">{{ old('description_ar', $file->description_ar) }}</textarea>
                            @error('description_ar')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- English Fields --}}
                    <div x-show="lang === 'en'" class="space-y-4" style="display: none;">
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2 text-left" dir="ltr">Title
                                (English) <span class="text-red-600">*</span></label>
                            <input type="text" dir="ltr"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('title_en') border-red-500 @enderror"
                                name="title_en" value="{{ old('title_en', $file->title_en) }}" required>
                            @error('title_en')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2 text-left"
                                dir="ltr">Description (English)</label>
                            <textarea dir="ltr"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('description_en') border-red-500 @enderror"
                                name="description_en" rows="3">{{ old('description_en', $file->description_en) }}</textarea>
                            @error('description_en')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2">المعرف (Slug) <span
                                    class="text-red-600">*</span></label>
                            <input type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('slug') border-red-500 @enderror"
                                name="slug" value="{{ old('slug', $file->slug) }}" required>
                            @error('slug')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">محتوى إضافي</label>
                    <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" name="content"
                        rows="3">{{ old('content', $file->content) }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">{{ __('common.general.file') }}</label>
                        @if ($file->file_url)
                            <div class="mb-3 p-3 bg-blue-50 rounded-lg">
                                <p class="text-sm text-blue-900">{{ __('common.general.file') }} الحالي: <a href="{{ $file->file_url }}"
                                        class="text-blue-600 hover:underline"
                                        target="_blank">{{ basename($file->file_url) }}</a></p>
                            </div>
                        @endif
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-blue-500 transition"
                            id="dropZone">
                            <input type="file" class="hidden" id="file" name="file"
                                accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                            <p class="text-gray-900 font-medium">اسحب {{ __('common.general.file') }} هنا أو اضغط للاختيار</p>
                            <p class="text-sm text-gray-600 mt-1">الحد الأقصى: 10 ميجابايت</p>
                            <p class="text-xs text-gray-500 mt-2" id="fileName"></p>
                        </div>
                        @error('file')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">نوع {{ __('common.general.file') }} <span
                                class="text-red-600">*</span></label>
                        <select
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                            name="file_type" required>
                            <option value="document"
                                {{ old('file_type', $file->file_type) == 'document' ? 'selected' : '' }}>{{ __('modules.files.file_types.document') }}</option>
                            <option value="pdf" {{ old('file_type', $file->file_type) == 'pdf' ? 'selected' : '' }}>
                                {{ __('modules.files.file_types.pdf') }}</option>
                            <option value="guide"
                                {{ old('file_type', $file->file_type) == 'guide' ? 'selected' : '' }}>{{ __('modules.marketing.resource_types.guide') }}</option>
                            <option value="template"
                                {{ old('file_type', $file->file_type) == 'template' ? 'selected' : '' }}>{{ __('modules.marketing.resource_types.template') }}</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">{{ __('common.general.order') }}</label>
                    <input type="number"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                        name="order" value="{{ old('order', $file->order) }}" min="0">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" class="w-4 h-4 rounded" name="is_active" value="1"
                        {{ old('is_active', $file->is_active) ? 'checked' : '' }}>
                    <label class="mr-2 text-sm text-gray-900">نشر {{ __('common.general.file') }}</label>
                </div>

                <div class="flex gap-3 mt-6 pt-6 border-t border-gray-200">
                    <x-ui.button type="submit" color="primary"><i class="fas fa-save"></i> تحديث</x-ui.button>
                    <x-ui.button href="{{ route('dashboard.files.manage') }}" color="gray"><i
                            class="fas fa-times"></i> {{ __('common.actions.cancel') }}</x-ui.button>
                </div>
            </form>
        </x-ui.card>
    </div>

    <script>
        // File upload with drag and drop
        const dropZone = document.getElementById('dropZone');
        const fileInput = document.getElementById('file');
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
                fileName.textContent = `{{ __('common.general.file') }} المختار: ${file.name} (${sizeMB} ميجابايت)`;
            } else {
                fileName.textContent = '';
            }
        }
    </script>
</x-layout.dashboard>
