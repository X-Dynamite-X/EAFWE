<x-layout.dashboard title="تعديل الملف">
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">تعديل الملف</h1>
            <p class="text-gray-600 mt-1">قم بتحديث معلومات الملف أدناه</p>
        </div>

        @if($errors->any())
        <x-ui.alert type="danger" class="mb-6">
            <strong>خطأ في البيانات المدخلة:</strong>
            <ul class="mt-2 space-y-1">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-ui.alert>
        @endif

        <x-ui.card>
            <form action="{{ route('dashboard.files.update', $file) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PATCH')

                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">العنوان <span class="text-red-600">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror" name="title" value="{{ old('title', $file->title) }}" required>
                    @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">المعرف (Slug) <span class="text-red-600">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('slug') border-red-500 @enderror" name="slug" value="{{ old('slug', $file->slug) }}" required>
                    @error('slug')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">الوصف <span class="text-red-600">*</span></label>
                    <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" name="description" rows="3" required>{{ old('description', $file->description) }}</textarea>
                    @error('description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">محتوى إضافي</label>
                    <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" name="content" rows="3">{{ old('content', $file->content) }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">الملف</label>
                        @if($file->file_url)
                        <div class="mb-3 p-3 bg-blue-50 rounded-lg">
                            <p class="text-sm text-blue-900">الملف الحالي: <a href="{{ $file->file_url }}" class="text-blue-600 hover:underline" target="_blank">{{ basename($file->file_url) }}</a></p>
                        </div>
                        @endif
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-blue-500 transition" id="dropZone">
                            <input type="file" class="hidden" id="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                            <p class="text-gray-900 font-medium">اسحب الملف هنا أو اضغط للاختيار</p>
                            <p class="text-sm text-gray-600 mt-1">الحد الأقصى: 10 ميجابايت</p>
                            <p class="text-xs text-gray-500 mt-2" id="fileName"></p>
                        </div>
                        @error('file')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">نوع الملف <span class="text-red-600">*</span></label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" name="file_type" required>
                            <option value="document" {{ old('file_type', $file->file_type) == 'document' ? 'selected' : '' }}>وثيقة</option>
                            <option value="pdf" {{ old('file_type', $file->file_type) == 'pdf' ? 'selected' : '' }}>PDF</option>
                            <option value="guide" {{ old('file_type', $file->file_type) == 'guide' ? 'selected' : '' }}>دليل</option>
                            <option value="template" {{ old('file_type', $file->file_type) == 'template' ? 'selected' : '' }}>نموذج</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">الترتيب</label>
                    <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" name="order" value="{{ old('order', $file->order) }}" min="0">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" class="w-4 h-4 rounded" name="is_active" value="1" {{ old('is_active', $file->is_active) ? 'checked' : '' }}>
                    <label class="mr-2 text-sm text-gray-900">نشر الملف</label>
                </div>

                <div class="flex gap-3 mt-6 pt-6 border-t border-gray-200">
                    <x-ui.button type="submit" color="primary"><i class="fas fa-save"></i> تحديث</x-ui.button>
                    <x-ui.button href="{{ route('dashboard.files.manage') }}" color="gray"><i class="fas fa-times"></i> إلغاء</x-ui.button>
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
                fileName.textContent = `الملف المختار: ${file.name} (${sizeMB} ميجابايت)`;
            } else {
                fileName.textContent = '';
            }
        }
    </script>
</x-layout.dashboard>
