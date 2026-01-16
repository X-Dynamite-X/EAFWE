<x-layout.dashboard title="إضافة فرصة مشاركة جديدة">
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">إضافة فرصة مشاركة جديدة</h1>
            <p class="text-gray-600 mt-1">ملأ النموذج أدناه لإنشاء فرصة مشاركة جديدة</p>
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
            <form action="{{ route('dashboard.participation.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">العنوان <span class="text-red-600">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror" name="title" value="{{ old('title') }}" required>
                    @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">المعرف (Slug) <span class="text-red-600">*</span></label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('slug') border-red-500 @enderror" name="slug" value="{{ old('slug') }}" required>
                    @error('slug')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">الوصف <span class="text-red-600">*</span></label>
                    <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" name="description" rows="3" required>{{ old('description') }}</textarea>
                    @error('description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">المحتوى <span class="text-red-600">*</span></label>
                    <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" name="content" rows="6" required>{{ old('content') }}</textarea>
                    @error('content')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">تاريخ البداية <span class="text-red-600">*</span></label>
                        <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" name="start_date" value="{{ old('start_date') }}" required>
                        @error('start_date')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">تاريخ النهاية <span class="text-red-600">*</span></label>
                        <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" name="end_date" value="{{ old('end_date') }}" required>
                        @error('end_date')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">الصورة</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-blue-500 transition" id="dropZone">
                            <input type="file" class="hidden" id="image" name="image" accept="image/jpeg,image/png,image/gif,image/webp">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                            <p class="text-gray-900 font-medium">اسحب الصورة هنا أو اضغط</p>
                            <p class="text-xs text-gray-500 mt-2" id="fileName"></p>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 mb-2">النوع <span class="text-red-600">*</span></label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" name="type" required>
                            <option value="">-- اختر --</option>
                            <option value="volunteer" {{ old('type') == 'volunteer' ? 'selected' : '' }}>تطوع</option>
                            <option value="partner" {{ old('type') == 'partner' ? 'selected' : '' }}>شراكة</option>
                            <option value="sponsor" {{ old('type') == 'sponsor' ? 'selected' : '' }}>رعاية</option>
                        </select>
                        @error('type')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" class="w-4 h-4 rounded" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
                    <label class="mr-2 text-sm text-gray-900">نشر الفرصة</label>
                </div>

                <div class="flex gap-3 mt-6 pt-6 border-t border-gray-200">
                    <x-ui.button type="submit" color="primary"><i class="fas fa-save"></i> حفظ</x-ui.button>
                    <x-ui.button href="{{ route('dashboard.participation.manage') }}" color="gray"><i class="fas fa-times"></i> إلغاء</x-ui.button>
                </div>
            </form>
        </x-ui.card>
    </div>

    <script>
        document.querySelector('[name="title"]').addEventListener('input', function(e) {
            const slug = e.target.value.toLowerCase().trim().replace(/[^\w\s-]/g, '').replace(/[\s_]+/g, '-').replace(/^-+|-+$/g, '');
            document.querySelector('[name="slug"]').value = slug;
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
                fileName.textContent = `${file.name} (${sizeMB} MB)`;
            } else {
                fileName.textContent = '';
            }
        }
    </script>
</x-layout.dashboard>
