<x-layout.dashboard title="إضافة برنامج تدريب جديد">
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">إضافة برنامج تدريب</h1>
            <p class="text-gray-600 mt-1">ملأ النموذج أدناه لإنشاء برنامج تدريب جديد</p>
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
            <form action="{{ route('dashboard.training.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-900 mb-2">
                        <i class="fas fa-heading"></i> العنوان <span class="text-red-600">*</span>
                    </label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="عنوان البرنامج" required>
                    @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-900 mb-2">
                        <i class="fas fa-link"></i> المعرف (Slug) <span class="text-red-600">*</span>
                    </label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('slug') border-red-500 @enderror" id="slug" name="slug" value="{{ old('slug') }}" placeholder="program-name" required>
                    @error('slug')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-900 mb-2">
                        <i class="fas fa-align-left"></i> الوصف
                    </label>
                    <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" id="description" name="description" rows="3" placeholder="وصف موجز">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-900 mb-2">
                        <i class="fas fa-file-alt"></i> المحتوى <span class="text-red-600">*</span>
                    </label>
                    <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 @error('content') border-red-500 @enderror" id="content" name="content" rows="6" placeholder="محتوى البرنامج" required>{{ old('content') }}</textarea>
                    @error('content')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-900 mb-2">
                            <i class="fas fa-tags"></i> النوع <span class="text-red-600">*</span>
                        </label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" id="category" name="category" required>
                            <option value="">-- اختر --</option>
                            <option value="training" {{ old('category') == 'training' ? 'selected' : '' }}>تدريب</option>
                            <option value="workshop" {{ old('category') == 'workshop' ? 'selected' : '' }}>ورشة عمل</option>
                            <option value="seminar" {{ old('category') == 'seminar' ? 'selected' : '' }}>ندوة</option>
                        </select>
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-900 mb-2">
                            <i class="fas fa-image"></i> الصورة
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-blue-500 transition" id="dropZone">
                            <input type="file" class="hidden" id="image" name="image" accept="image/jpeg,image/png,image/gif,image/webp">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                            <p class="text-gray-900 font-medium">اسحب الصورة هنا أو اضغط للاختيار</p>
                            <p class="text-sm text-gray-600 mt-1">الحد الأقصى: 5 ميجابايت</p>
                            <p class="text-xs text-gray-500 mt-2" id="fileName"></p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" class="w-4 h-4 rounded" id="is_active" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
                    <label class="mr-2 text-sm text-gray-900" for="is_active">نشر البرنامج</label>
                </div>

                <div class="flex gap-3 mt-6 pt-6 border-t border-gray-200">
                    <x-ui.button type="submit" color="primary"><i class="fas fa-save"></i> حفظ البرنامج</x-ui.button>
                    <x-ui.button href="{{ route('dashboard.training.manage') }}" color="gray"><i class="fas fa-times"></i> إلغاء</x-ui.button>
                </div>
            </form>
        </x-ui.card>
    </div>

    <script>
        document.getElementById('title').addEventListener('input', function(e) {
            const slug = e.target.value.toLowerCase().trim().replace(/[^\w\s-]/g, '').replace(/[\s_]+/g, '-').replace(/^-+|-+$/g, '');
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
                fileName.textContent = `الصورة المختارة: ${file.name} (${sizeMB} ميجابايت)`;
            } else {
                fileName.textContent = '';
            }
        }
    </script>

</x-layout.dashboard>

