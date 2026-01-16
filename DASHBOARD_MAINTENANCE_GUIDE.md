# 📖 دليل الحفاظ على توحيد التصميم

## لضمان بقاء Dashboard موحداً ومتسقاً

---

## ✅ قائمة الفحص عند إضافة صفحة جديدة

### الخطوة 1: البنية الأساسية
```blade
<x-layout.dashboard title="العنوان">
    <!-- استخدم دائماً هذا الإطار الأساسي -->
</x-layout.dashboard>
```

### الخطوة 2: Header القياسي
```blade
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">العنوان</h1>
        <p class="text-gray-600 mt-1">الوصف الفرعي</p>
    </div>
    <x-ui.button href="{{ route('...') }}" color="primary">
        <i class="fas fa-cog"></i> إدارة
    </x-ui.button>
</div>
```

### الخطوة 3: Alert للنجاح
```blade
@if(session('success'))
    <x-ui.alert type="success" class="mb-6">
        {{ session('success') }}
    </x-ui.alert>
@endif
```

### الخطوة 4: Grid من البطاقات
```blade
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($items as $item)
        <x-ui.card class="h-full flex flex-col hover:shadow-lg transition-shadow">
            <!-- محتوى البطاقة -->
        </x-ui.card>
    @endforeach
</div>
```

### الخطوة 5: الحالة الفارغة
```blade
@else
    <x-ui.alert type="info" class="text-center">
        <div class="flex justify-center mb-2">
            <i class="fas fa-info-circle text-4xl text-blue-400"></i>
        </div>
        <p class="text-gray-700 font-medium">لا توجد عناصر متاحة</p>
    </x-ui.alert>
@endif
```

---

## 🎨 الألوان الموحدة

### استخدمها دائماً:
```tailwind
العناوين الكبيرة:      text-gray-900
النصوص:               text-gray-600
النصوص الفرعية:       text-gray-500
المسافات الفاصلة:     border-gray-200
الخلفيات الفاتحة:     bg-gray-50 / bg-gray-100
الأيقونات:            text-*-400 (blue, green, etc.)
```

### لا تستخدم:
```tailwind
❌ text-muted
❌ bg-light
❌ text-white (على خلفيات مظلمة فقط)
❌ Bootstrap colors
```

---

## 📏 المسافات الموحدة

### استخدمها دائماً:
```tailwind
بين الأقسام الرئيسية:  mb-6
بين البطاقات:         gap-6
بين العناصر:          mb-4
مسافات صغيرة:         mt-1
```

### لا تستخدم:
```tailwind
❌ mb-3, mb-5, mb-8
❌ gap-4, gap-8
❌ mt-2, mt-3
```

---

## 🎯 أنواع البطاقات

### بطاقة عادية:
```blade
<x-ui.card>
    <h3 class="text-lg font-semibold text-gray-900">العنوان</h3>
    <p class="text-gray-600 text-sm mt-2">الوصف</p>
</x-ui.card>
```

### بطاقة مع صورة:
```blade
<x-ui.card class="h-full flex flex-col">
    @if($item->image_url)
    <img src="{{ $item->image_url }}" class="w-full h-48 object-cover rounded-t-lg -m-4 mb-4">
    @else
    <div class="w-full h-48 bg-gray-100 flex items-center justify-center -m-4 mb-4">
        <i class="fas fa-image text-5xl text-gray-300"></i>
    </div>
    @endif
    
    <div class="flex-1 flex flex-col">
        <!-- محتوى -->
    </div>
</x-ui.card>
```

### بطاقة مع رابط في الأسفل:
```blade
<x-ui.card class="h-full flex flex-col hover:shadow-lg transition-shadow">
    <div class="flex-1 flex flex-col">
        <!-- محتوى -->
    </div>
    
    <div class="mt-auto pt-4 border-t border-gray-200">
        <a href="{{ route(...) }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm font-medium gap-1">
            عرض التفاصيل
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>
</x-ui.card>
```

---

## 🎯 أنواع الأزرار

### الزر الأساسي:
```blade
<x-ui.button color="primary">إضافة جديد</x-ui.button>
```

### الزر مع أيقونة:
```blade
<x-ui.button href="{{ route(...) }}" color="primary">
    <i class="fas fa-cog"></i> إدارة
</x-ui.button>
```

### أزرار مختلفة:
```blade
color="primary"   <!-- الزرقاء -->
color="gold"      <!-- الذهبية -->
color="green"     <!-- الخضراء -->
color="red"       <!-- الحمراء -->
```

---

## 🎯 أنواع الشارات

### شارة عادية:
```blade
<x-ui.badge color="blue">نشط</x-ui.badge>
```

### الألوان المتاحة:
```blade
color="blue"      <!-- أزرق -->
color="green"     <!-- أخضر -->
color="red"       <!-- أحمر -->
color="yellow"    <!-- أصفر -->
color="gold"      <!-- ذهبي -->
color="gray"      <!-- رمادي -->
```

---

## ⚠️ أنواع التنبيهات

### نجاح:
```blade
<x-ui.alert type="success" class="mb-6">
    تم حفظ البيانات بنجاح
</x-ui.alert>
```

### خطأ:
```blade
<x-ui.alert type="error" class="mb-6">
    حدث خطأ ما
</x-ui.alert>
```

### معلومات:
```blade
<x-ui.alert type="info" class="mb-6">
    معلومة مهمة
</x-ui.alert>
```

### تحذير:
```blade
<x-ui.alert type="warning" class="mb-6">
    انتبه!
</x-ui.alert>
```

---

## 🔍 الأيقونات

### استخدم Font Awesome فقط:
```html
<i class="fas fa-plus"></i>           <!-- إضافة -->
<i class="fas fa-edit"></i>           <!-- تعديل -->
<i class="fas fa-trash"></i>          <!-- حذف -->
<i class="fas fa-eye"></i>            <!-- عرض -->
<i class="fas fa-cog"></i>            <!-- إدارة -->
<i class="fas fa-arrow-left"></i>     <!-- السهم الأيسر -->
<i class="fas fa-check"></i>          <!-- تحقق -->
<i class="fas fa-times"></i>          <!-- إغلاق -->
<i class="fas fa-info-circle"></i>    <!-- معلومة -->
<i class="fas fa-exclamation"></i>    <!-- تحذير -->
```

### لا تستخدم:
```html
❌ SVG icons مباشرة
❌ Emoji
❌ رموز نصية
```

---

## ✔️ قائمة الفحص النهائية

قبل نشر أي صفحة جديدة:

- [ ] استخدام `<x-layout.dashboard>`
- [ ] Header موحد مع العنوان والوصف
- [ ] Alert للنجاح إن وجد
- [ ] Grid من البطاقات (grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3)
- [ ] بطاقات تستخدم `<x-ui.card>`
- [ ] أزرار تستخدم `<x-ui.button>`
- [ ] شارات تستخدم `<x-ui.badge>`
- [ ] تنبيهات تستخدم `<x-ui.alert>`
- [ ] أيقونات Font Awesome فقط
- [ ] الألوان موحدة
- [ ] المسافات موحدة
- [ ] حالة فارغة (Empty state) إن وجدت
- [ ] بدون Bootstrap classes
- [ ] بدون inline styles
- [ ] متجاوب على جميع الأجهزة

---

## 🚫 ما يجب تجنبه

```blade
❌ <div class="row">
❌ <div class="col-md-*">
❌ <div class="card">
❌ <a class="btn btn-*">
❌ <span class="badge">
❌ <div class="alert">
❌ <div style="...">
❌ Custom CSS classes
❌ SVG icons مباشرة
❌ Bootstrap components
```

---

## 📚 المراجع

للمزيد من المعلومات:
- **DASHBOARD_QUICK_CHECK.md** - دليل سريع
- **BEFORE_AFTER_COMPARISON.md** - أمثلة عملية
- **DASHBOARD_DESIGN_CONSISTENCY_REPORT.md** - التقرير الشامل

---

## 💬 الدعم والمساعدة

إذا واجهت مشكلة أو لم تتأكد من التنسيق:
1. راجع **DASHBOARD_QUICK_CHECK.md**
2. انظر إلى صفحة موجودة كمثال
3. اتبع نفس البنية والمكونات
4. اختبر على أجهزة مختلفة

---

## ✨ ملاحظات نهائية

الحفاظ على التوحيد يسهل:
✅ صيانة الكود
✅ إضافة صفحات جديدة
✅ تحديث التصميم
✅ فهم الكود
✅ تجربة المستخدم

شكراً على متابعة هذه المعايير! 🙏
