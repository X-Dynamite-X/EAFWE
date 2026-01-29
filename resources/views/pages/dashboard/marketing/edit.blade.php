<x-layout.dashboard title="{{ __('common.actions.edit') }} {{ __('modules.marketing.title') }}">
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">{{ __('common.actions.edit') }}
                {{ __('modules.marketing.title') }}</h1>
            <p class="text-gray-600 mt-1">{{ __('modules.marketing.update_info') }}</p>
        </div>

        @if ($errors->any())
            <x-ui.alert type="danger" class="mb-6">
                <strong>{{ __('common.general.error') }} في البيانات:</strong>
                <ul class="mt-2 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-ui.alert>
        @endif

        <x-ui.card>
            <form action="{{ route('dashboard.marketing.update', $resource) }}" method="POST"
                enctype="multipart/form-data" class="space-y-4">
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
                            {{ __('common.tabs.english') }}
                        </button>
                    </div>

                    {{-- Arabic Fields --}}
                    <div x-show="lang === 'ar'" class="space-y-4">
                        <div>
                            <label
                                class="block text-sm font-medium text-gray-900 mb-2">{{ __('modules.marketing.fields.title') }}
                                {{ __('common.general.in_arabic') }} <span class="text-red-600">*</span></label>
                            <input type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                id="title_ar" name="title_ar" value="{{ old('title_ar', $resource->title_ar) }}"
                                required>
                        </div>
                        <div>
                            <label
                                class="block text-sm font-medium text-gray-900 mb-2">{{ __('modules.marketing.fields.description') }}
                                {{ __('common.general.in_arabic') }}</label>
                            <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                name="description_ar" rows="3">{{ old('description_ar', $resource->description_ar) }}</textarea>
                        </div>
                        <div>
                            <label
                                class="block text-sm font-medium text-gray-900 mb-2">{{ __('modules.marketing.fields.content') }}
                                {{ __('common.general.in_arabic') }} <span class="text-red-600">*</span></label>
                            <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" name="content_ar"
                                rows="6" required>{{ old('content_ar', $resource->content_ar) }}</textarea>
                        </div>
                    </div>

                    {{-- English Fields --}}
                    <div x-show="lang === 'en'" class="space-y-4" style="display: none;">
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2 text-left"
                                dir="ltr">{{ __('modules.marketing.fields.title') }}
                                {{ __('common.general.in_english') }} <span class="text-red-600">*</span></label>
                            <input type="text" dir="ltr"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                name="title_en" value="{{ old('title_en', $resource->title_en) }}" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2 text-left"
                                dir="ltr">{{ __('modules.marketing.fields.description') }}
                                {{ __('common.general.in_english') }}</label>
                            <textarea dir="ltr" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                name="description_en" rows="3">{{ old('description_en', $resource->description_en) }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-900 mb-2 text-left"
                                dir="ltr">{{ __('modules.marketing.fields.content') }}
                                {{ __('common.general.in_english') }} <span class="text-red-600">*</span></label>
                            <textarea dir="ltr" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                name="content_en" rows="6" required>{{ old('content_en', $resource->content_en) }}</textarea>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">المعرف (Slug) <span
                            class="text-red-600">*</span></label>
                    <input type="text"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('slug') border-red-500 @enderror"
                        id="slug" name="slug" value="{{ old('slug', $resource->slug) }}" required>
                    @error('slug')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-900 mb-2">{{ __('modules.marketing.fields.resource_type') }}
                            <span class="text-red-600">*</span></label>
                        <select
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                            name="resource_type" required>
                            <option value="guide"
                                {{ old('resource_type', $resource->resource_type) == 'guide' ? 'selected' : '' }}>
                                {{ __('modules.marketing.resource_types.guide') }}
                                ({{ __('modules.marketing.resource_types.guide_full') }})</option>
                            <option value="template"
                                {{ old('resource_type', $resource->resource_type) == 'template' ? 'selected' : '' }}>
                                {{ __('modules.marketing.resource_types.template') }}
                                ({{ __('modules.marketing.resource_types.template_ready') }})</option>
                            <option value="case-study"
                                {{ old('resource_type', $resource->resource_type) == 'case-study' ? 'selected' : '' }}>
                                {{ __('modules.marketing.resource_types.case-study') }}</option>
                        </select>
                        @error('resource_type')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label
                            class="block text-sm font-medium text-gray-900 mb-2">{{ __('common.general.image') }}</label>
                        @if ($resource->image_url)
                            <p class="text-xs text-blue-600 mb-2">{{ __('common.general.current_image') }}: <img
                                    src="{{ $resource->image_url }}" alt=""
                                    class="w-16 h-16 rounded inline-block"></p>
                        @endif
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center cursor-pointer hover:border-blue-500 transition"
                            id="imageDropZone">
                            <input type="file" class="hidden" id="image" name="image"
                                accept="image/jpeg,image/png,image/gif,image/webp">
                            <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-1"></i>
                            <p class="text-sm text-gray-900">{{ __('common.form.drag_drop') }}</p>
                            <p class="text-xs text-gray-500 mt-1" id="imageFileName"></p>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">{{ __('common.general.file') }}
                        ({{ __('modules.files.file_types.pdf') }}, Doc)</label>
                    @if ($resource->file_url)
                        <p class="text-xs text-blue-600 mb-2">{{ __('common.general.current_file') }}: <a
                                href="{{ $resource->file_url }}" target="_blank"
                                class="text-blue-600 hover:underline">{{ basename($resource->file_url) }}</a></p>
                    @endif
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-blue-500 transition"
                        id="fileDropZone">
                        <input type="file" class="hidden" id="file" name="file"
                            accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip">
                        <i class="fas fa-file-upload text-3xl text-gray-400 mb-2"></i>
                        <p class="text-gray-900 font-medium">{{ __('common.form.drag_drop') }}</p>
                        <p class="text-xs text-gray-500 mt-2" id="fileFileName"></p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <div class="flex items-center">
                        <input type="checkbox" class="w-4 h-4 rounded" name="is_active" value="1"
                            {{ old('is_active', $resource->is_active) ? 'checked' : '' }}>
                        <label
                            class="mr-2 text-sm text-gray-900">{{ __('modules.marketing.fields.is_active') }}</label>
                    </div>
                    <div class="flex-1">
                        <label
                            class="block text-sm font-medium text-gray-900 mb-2">{{ __('common.general.order') }}</label>
                        <input type="number"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                            name="order" value="{{ old('order', $resource->order) }}" min="0">
                    </div>
                </div>

                <div class="flex gap-3 mt-6 pt-6 border-t border-gray-200">
                    <x-ui.button type="submit" color="primary"><i class="fas fa-save"></i>
                        {{ __('common.actions.update') }}</x-ui.button>
                    <x-ui.button href="{{ route('dashboard.marketing.manage') }}" color="gray"><i
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

        // Image file upload
        const imageDropZone = document.getElementById('imageDropZone');
        const imageInput = document.getElementById('image');
        const imageFileName = document.getElementById('imageFileName');

        imageDropZone.addEventListener('click', () => imageInput.click());
        imageDropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            imageDropZone.classList.add('border-blue-500', 'bg-blue-50');
        });
        imageDropZone.addEventListener('dragleave', () => {
            imageDropZone.classList.remove('border-blue-500', 'bg-blue-50');
        });
        imageDropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            imageDropZone.classList.remove('border-blue-500', 'bg-blue-50');
            if (e.dataTransfer.files.length > 0) {
                imageInput.files = e.dataTransfer.files;
                updateImageFileName();
            }
        });
        imageInput.addEventListener('change', updateImageFileName);

        function updateImageFileName() {
            if (imageInput.files.length > 0) {
                const file = imageInput.files[0];
                imageFileName.textContent = `${file.name}`;
            } else {
                imageFileName.textContent = '';
            }
        }

        // File upload
        const fileDropZone = document.getElementById('fileDropZone');
        const fileInput = document.getElementById('file');
        const fileFileName = document.getElementById('fileFileName');

        fileDropZone.addEventListener('click', () => fileInput.click());
        fileDropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            fileDropZone.classList.add('border-blue-500', 'bg-blue-50');
        });
        fileDropZone.addEventListener('dragleave', () => {
            fileDropZone.classList.remove('border-blue-500', 'bg-blue-50');
        });
        fileDropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            fileDropZone.classList.remove('border-blue-500', 'bg-blue-50');
            if (e.dataTransfer.files.length > 0) {
                fileInput.files = e.dataTransfer.files;
                updateFileFileName();
            }
        });
        fileInput.addEventListener('change', updateFileFileName);

        function updateFileFileName() {
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                const sizeMB = (file.size / 1024 / 1024).toFixed(2);
                fileFileName.textContent = `${file.name} (${sizeMB} MB)`;
            } else {
                fileFileName.textContent = '';
            }
        }
    </script>
</x-layout.dashboard>
