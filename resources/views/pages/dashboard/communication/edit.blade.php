<x-layout.dashboard title="تعديل الاتصال">
    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">تعديل الاتصال</h1>
            <p class="text-gray-600 mt-1">قم بتحديث بيانات الإعلان أدناه</p>
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
            <form action="{{ route('dashboard.communication.update', $communication) }}" method="POST" class="space-y-4">
                @csrf
                @method('PATCH')

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-900 mb-2">
                        <i class="fas fa-heading"></i> العنوان
                        <span class="text-red-600">*</span>
                    </label>
                    <input type="text"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                           id="title"
                           name="title"
                           value="{{ old('title', $communication->title) }}"
                           required>
                    @error('title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-900 mb-2">
                        <i class="fas fa-link"></i> المعرف (Slug)
                        <span class="text-red-600">*</span>
                    </label>
                    <input type="text"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('slug') border-red-500 @enderror"
                           id="slug"
                           name="slug"
                           value="{{ old('slug', $communication->slug) }}"
                           required>
                    @error('slug')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-900 mb-2">
                        <i class="fas fa-file-alt"></i> نص الإعلان
                        <span class="text-red-600">*</span>
                    </label>
                    <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('message') border-red-500 @enderror"
                              id="message"
                              name="message"
                              rows="6"
                              required>{{ old('message', $communication->message) }}</textarea>
                    @error('message')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-900 mb-2">
                            <i class="fas fa-tags"></i> النوع
                            <span class="text-red-600">*</span>
                        </label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('type') border-red-500 @enderror"
                                id="type"
                                name="type"
                                required>
                            <option value="announcement" {{ old('type', $communication->type) == 'announcement' ? 'selected' : '' }}>إعلان</option>
                            <option value="newsletter" {{ old('type', $communication->type) == 'newsletter' ? 'selected' : '' }}>نشرة بريدية</option>
                            <option value="notification" {{ old('type', $communication->type) == 'notification' ? 'selected' : '' }}>إشعار</option>
                        </select>
                        @error('type')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="published_date" class="block text-sm font-medium text-gray-900 mb-2">
                            <i class="fas fa-calendar"></i> تاريخ النشر
                        </label>
                        <input type="date"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('published_date') border-red-500 @enderror"
                               id="published_date"
                               name="published_date"
                               value="{{ old('published_date', $communication->published_date?->format('Y-m-d')) }}">
                        @error('published_date')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex items-center">
                        <input type="checkbox"
                               class="w-4 h-4 rounded"
                               id="is_active"
                               name="is_active"
                               value="1"
                               {{ old('is_active', $communication->is_active) ? 'checked' : '' }}>
                        <label class="mr-2 text-sm text-gray-900" for="is_active">
                            نشر الإعلان
                        </label>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox"
                               class="w-4 h-4 rounded"
                               id="is_pinned"
                               name="is_pinned"
                               value="1"
                               {{ old('is_pinned', $communication->is_pinned) ? 'checked' : '' }}>
                        <label class="mr-2 text-sm text-gray-900" for="is_pinned">
                            تثبيت الإعلان
                        </label>
                    </div>
                </div>

                <div>
                    <label for="order" class="block text-sm font-medium text-gray-900 mb-2">
                        <i class="fas fa-sort-numeric-up"></i> ترتيب العرض
                    </label>
                    <input type="number"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('order') border-red-500 @enderror"
                           id="order"
                           name="order"
                           value="{{ old('order', $communication->order) }}"
                           min="0">
                    @error('order')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3 mt-6 pt-6 border-t border-gray-200">
                    <x-ui.button type="submit" color="primary">
                        <i class="fas fa-save"></i> حفظ التعديلات
                    </x-ui.button>
                    <x-ui.button href="{{ route('dashboard.communication.manage') }}" color="gray">
                        <i class="fas fa-times"></i> إلغاء
                    </x-ui.button>
                </div>
            </form>
        </x-ui.card>
    </div>
</x-layout.dashboard>
