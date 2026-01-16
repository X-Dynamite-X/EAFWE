# دليل تطبيق نظام إدارة محتوى لوحة التحكم

## نظرة عامة

تم تحويل جميع صفحات لوحة التحكم من صفحات ثابتة إلى نظام كامل قائم على قاعدة البيانات مع إمكانيات الإضافة والتعديل والحذف من خلال لوحة إدارة الأدمن.

## المكونات المُنشأة

### 1. جداول قاعدة البيانات (Migrations)

تم إنشاء الجداول التالية:

#### `training_programs` - برامج التدريب
- id (Primary Key)
- title (عنوان البرنامج)
- slug (المعرف الفريد)
- description (الوصف المختصر)
- content (المحتوى الكامل - HTML)
- image_url (رابط الصورة)
- category (النوع: training, workshop, seminar)
- is_active (نشط/غير نشط)
- order (ترتيب العرض)
- timestamps (created_at, updated_at)

#### `entrepreneurship_programs` - برامج الريادة
- id, title, slug, description, content, image_url
- type (business, startup, mentorship)
- is_active, order, timestamps

#### `participation_opportunities` - فرص المشاركة
- id, title, slug, description, content, image_url
- type (volunteer, partner, sponsor)
- start_date, end_date
- is_active, order, timestamps

#### `marketing_resources` - موارد التسويق
- id, title, slug, description, content, image_url
- resource_type (guide, template, case-study)
- file_url (رابط الملف)
- is_active, order, timestamps

#### `member_files` - ملفات الأعضاء
- id, title, slug, description
- file_type (document, pdf, guide, template)
- file_url (رابط التحميل)
- file_size (حجم الملف)
- category (الفئة)
- is_active, order, timestamps

#### `communications` - الاتصالات والإعلانات
- id, title, slug, message
- type (announcement, newsletter, notification)
- published_date (تاريخ النشر)
- is_active, is_pinned (تثبيت الإعلان)
- order, timestamps

#### `portal_opportunities` - فرص البوابة
- id, title, slug, description, content, image_url
- opportunity_type (business, partnership, funding)
- start_date, end_date
- status (active, closed, upcoming)
- is_active, order, timestamps

### 2. النماذج (Models)

تم إنشاء نماذج Eloquent لكل جدول:

```php
- App\Models\TrainingProgram
- App\Models\EntrepreneurshipProgram
- App\Models\ParticipationOpportunity
- App\Models\MarketingResource
- App\Models\MemberFile
- App\Models\Communication
- App\Models\PortalOpportunity
```

جميع النماذج تشمل:
- `$fillable` property للحقول القابلة للملء
- `$casts` property لتحويل الأنواع البيانية

### 3. المتحكمات (Controllers)

تم إنشاء متحكم لكل مورد:

```php
- App\Http\Controllers\TrainingProgramController
- App\Http\Controllers\EntrepreneurshipProgramController
- App\Http\Controllers\ParticipationOpportunityController
- App\Http\Controllers\MarketingResourceController
- App\Http\Controllers\MemberFileController
- App\Http\Controllers\CommunicationController
- App\Http\Controllers\PortalOpportunityController
```

كل متحكم يشمل على الوظائف التالية:

```php
public function index()           // عرض القائمة (للأعضاء)
public function manage()          // إدارة العناصر (للأدمن)
public function create()          // نموذج الإضافة
public function store()           // حفظ العنصر الجديد
public function show()            // عرض عنصر واحد
public function edit()            // نموذج التعديل
public function update()          // تحديث العنصر
public function destroy()         // حذف العنصر
```

### 4. البذور (Seeders)

تم إنشاء بيانات أولية لكل جدول:

```php
- Database\Seeders\TrainingProgramSeeder
- Database\Seeders\EntrepreneurshipProgramSeeder
- Database\Seeders\ParticipationOpportunitySeeder
- Database\Seeders\MarketingResourceSeeder
- Database\Seeders\MemberFileSeeder
- Database\Seeders\CommunicationSeeder
- Database\Seeders\PortalOpportunitySeeder
```

تم دمج جميع البذور في `DatabaseSeeder`.

### 5. المسارات (Routes)

تم تحديث جميع المسارات في `routes/web.php` بالبنية التالية:

```php
// مسارات التدريب
Route::prefix('dashboard/training')->name('training.')->group(function () {
    Route::get('', [TrainingProgramController::class, 'index'])->name('index');
    Route::get('manage', [TrainingProgramController::class, 'manage'])
        ->middleware('permission:manage training programs')->name('manage');
    Route::get('create', [TrainingProgramController::class, 'create'])
        ->middleware('permission:manage training programs')->name('create');
    Route::post('', [TrainingProgramController::class, 'store'])
        ->middleware('permission:manage training programs')->name('store');
    // ... إلخ
});
```

كل مسار إدارة يتطلب:
- تسجيل الدخول (middleware: auth)
- صلاحيات محددة (middleware: permission)

### 6. الصلاحيات (Permissions)

تم إضافة الصلاحيات التالية إلى النظام:

- `manage training programs` - إدارة برامج التدريب
- `manage entrepreneurship programs` - إدارة برامج الريادة
- `manage participation opportunities` - إدارة فرص المشاركة
- `manage marketing resources` - إدارة موارد التسويق
- `manage member files` - إدارة ملفات الأعضاء
- `manage communications` - إدارة الاتصالات
- `manage portal opportunities` - إدارة فرص البوابة

**توزيع الصلاحيات:**
- Admin: جميع الصلاحيات
- Staff: جميع الصلاحيات الجديدة + الصلاحيات السابقة
- Member: بدون صلاحيات الإدارة

### 7. الخدمات (Services)

تم تحديث `RolePermissionService` لإضافة الصلاحيات الجديدة تلقائياً.

## خطوات التثبيت والتشغيل

### 1. تشغيل الترحيلات

```bash
php artisan migrate
```

سيتم إنشاء جميع الجداول الجديدة.

### 2. ملء البيانات الأولية

```bash
php artisan db:seed
```

سيتم إدراج البيانات الأولية في جميع الجداول والصلاحيات.

### 3. إنشاء مشرف (اختياري - إذا لم تشغل المشروع من قبل)

```bash
php artisan tinker
```

ثم:
```php
$admin = App\Models\User::create([
    'name' => 'مدير النظام',
    'email' => 'admin@example.com',
    'password' => bcrypt('password'),
    'is_active' => true,
]);
$admin->assignRole('admin');
```

## هيكل المسارات

### للأعضاء (عرض المحتوى):

```
GET  /dashboard/training                      // عرض برامج التدريب
GET  /dashboard/entrepreneurship              // عرض برامج الريادة
GET  /dashboard/participation/opportunities   // عرض فرص المشاركة
GET  /dashboard/marketing                     // عرض موارد التسويق
GET  /dashboard/files                         // عرض ملفات الأعضاء
GET  /dashboard/communication                 // عرض الاتصالات
GET  /dashboard/portal/opportunities          // عرض فرص البوابة
GET  /dashboard/portal/volunteering           // عرض فرص التطوع
```

### للمشرفين (إدارة المحتوى):

```
# التدريب
GET    /dashboard/training/manage              // قائمة البرامج
GET    /dashboard/training/create              // نموذج الإضافة
POST   /dashboard/training                     // حفظ برنامج جديد
GET    /dashboard/training/{training}/edit     // نموذج التعديل
PATCH  /dashboard/training/{training}          // تحديث برنامج
DELETE /dashboard/training/{training}          // حذف برنامج

# وبنفس الطريقة للأقسام الأخرى:
# - /dashboard/entrepreneurship
# - /dashboard/participation
# - /dashboard/marketing
# - /dashboard/files
# - /dashboard/communication
# - /dashboard/portal
```

## نمط المتحكمات

جميع المتحكمات تتبع نفس النمط:

```php
<?php

namespace App\Http\Controllers;

use App\Models\YourModel;
use Illuminate\Http\Request;

class YourController extends Controller
{
    // عرض القائمة (للأعضاء)
    public function index()
    {
        $items = YourModel::where('is_active', true)
            ->orderBy('order')
            ->get();
        return view('pages.dashboard.your.index', compact('items'));
    }

    // إدارة العناصر (للمشرفين)
    public function manage()
    {
        $items = YourModel::orderBy('order')->get();
        return view('pages.dashboard.your.manage', compact('items'));
    }

    // نموذج الإضافة
    public function create()
    {
        return view('pages.dashboard.your.create');
    }

    // حفظ العنصر
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:table_name,slug',
            // الحقول الأخرى
        ]);
        
        YourModel::create($validated);
        return redirect()->route('your.manage')->with('success', 'تم الإضافة بنجاح');
    }

    // العمليات الأخرى (show, edit, update, destroy)
}
```

## إنشاء العروض (Views)

يتم إنشاء العروض في المسارات التالية:

```
resources/views/pages/dashboard/
├── training/
│   ├── index.blade.php          // عرض للأعضاء
│   ├── manage.blade.php         // قائمة الإدارة
│   ├── create.blade.php         // نموذج الإضافة
│   ├── edit.blade.php           // نموذج التعديل
│   └── show.blade.php           // عرض تفصيلي
├── entrepreneurship/
├── participation/
├── marketing/
├── files/
├── communication/
└── portal-opportunities/
```

## مثال لإنشاء عرض (View)

### training/index.blade.php (للأعضاء)

```blade
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2>برامج التدريب</h2>
        </div>
        @can('manage training programs')
        <div class="col-md-4 text-end">
            <a href="{{ route('training.manage') }}" class="btn btn-primary">
                إدارة البرامج
            </a>
        </div>
        @endcan
    </div>

    <div class="row">
        @forelse($programs as $program)
        <div class="col-md-4 mb-4">
            <div class="card">
                @if($program->image_url)
                <img src="{{ $program->image_url }}" class="card-img-top" alt="{{ $program->title }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $program->title }}</h5>
                    <p class="card-text">{{ $program->description }}</p>
                    <span class="badge bg-primary">{{ $program->category }}</span>
                </div>
                <div class="card-footer">
                    <a href="{{ route('training.show', $program) }}" class="btn btn-sm btn-info">
                        عرض التفاصيل
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">لا توجد برامج متاحة حالياً</div>
        </div>
        @endforelse
    </div>
</div>
@endsection
```

### training/manage.blade.php (للمشرفين)

```blade
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2>إدارة برامج التدريب</h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('training.create') }}" class="btn btn-success">
                إضافة برنامج جديد
            </a>
        </div>
    </div>

    @if($programs->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>العنوان</th>
                <th>الفئة</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($programs as $program)
            <tr>
                <td>{{ $program->id }}</td>
                <td>{{ $program->title }}</td>
                <td><span class="badge bg-info">{{ $program->category }}</span></td>
                <td>
                    @if($program->is_active)
                        <span class="badge bg-success">نشط</span>
                    @else
                        <span class="badge bg-danger">معطل</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('training.edit', $program) }}" class="btn btn-sm btn-primary">
                        تعديل
                    </a>
                    <form action="{{ route('training.destroy', $program) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل متأكد؟')">
                            حذف
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-info">لا توجد برامج حالياً</div>
    @endif
</div>
@endsection
```

### training/create.blade.php (نموذج الإضافة)

```blade
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>إضافة برنامج تدريب جديد</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('training.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">العنوان</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                   id="title" name="title" value="{{ old('title') }}" required>
            @error('title')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">المعرف (Slug)</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                   id="slug" name="slug" value="{{ old('slug') }}" required>
            @error('slug')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">الوصف المختصر</label>
            <textarea class="form-control @error('description') is-invalid @enderror" 
                      id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
            @error('description')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">المحتوى</label>
            <textarea class="form-control @error('content') is-invalid @enderror" 
                      id="content" name="content" rows="6" required>{{ old('content') }}</textarea>
            @error('content')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label for="image_url" class="form-label">رابط الصورة</label>
            <input type="url" class="form-control @error('image_url') is-invalid @enderror" 
                   id="image_url" name="image_url" value="{{ old('image_url') }}">
            @error('image_url')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">النوع</label>
            <select class="form-control @error('category') is-invalid @enderror" 
                    id="category" name="category" required>
                <option value="">-- اختر نوع البرنامج --</option>
                <option value="training" {{ old('category') == 'training' ? 'selected' : '' }}>تدريب</option>
                <option value="workshop" {{ old('category') == 'workshop' ? 'selected' : '' }}>ورشة عمل</option>
                <option value="seminar" {{ old('category') == 'seminar' ? 'selected' : '' }}>ندوة</option>
            </select>
            @error('category')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" 
                       value="1" {{ old('is_active') ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">نشط</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="order" class="form-label">ترتيب العرض</label>
            <input type="number" class="form-control @error('order') is-invalid @enderror" 
                   id="order" name="order" value="{{ old('order', 0) }}" min="0">
            @error('order')<span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="btn btn-success">حفظ</button>
        <a href="{{ route('training.manage') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>
@endsection
```

## المميزات

✅ **نظام إدارة كامل** - إضافة، تعديل، حذف المحتوى
✅ **قاعدة بيانات منظمة** - جميع البيانات محفوظة بشكل آمن
✅ **صلاحيات محددة** - التحكم الكامل بمن يستطيع الإدارة
✅ **بيانات أولية** - تم إنشاء بيانات تجريبية للبدء
✅ **نمط معياري** - جميع المتحكمات تتبع نفس النمط
✅ **سهولة التوسع** - يمكن إضافة موارد جديدة بسهولة

## الخطوات التالية

1. **إنشاء العروض (Views)** - استخدم الأمثلة أعلاه لإنشاء عرض كامل لكل قسم
2. **تخصيص التصميم** - طبق تصميمك الخاص على القوالب
3. **إضافة صور فعلية** - استبدل روابط الصور البديلة برابط حقيقية
4. **اختبار الصلاحيات** - تأكد من أن الصلاحيات تعمل بشكل صحيح

## الأوامر المفيدة

```bash
# تشغيل الترحيلات
php artisan migrate

# ملء البيانات
php artisan db:seed

# إعادة تعيين وملء البيانات
php artisan migrate:fresh --seed

# مسح الذاكرة المؤقتة
php artisan cache:clear
php artisan config:cache

# البحث عن المسارات
php artisan route:list
```

## استكشاف الأخطاء

### خطأ: "SQLSTATE[42S02]: Table not found"
**الحل:** قم بتشغيل `php artisan migrate`

### خطأ: "Undefined relationship"
**الحل:** تأكد من إضافة النماذج بشكل صحيح في المتحكمات

### مشكلة الصلاحيات
**الحل:** قم بتشغيل `php artisan db:seed` لإعادة إنشاء الصلاحيات

## الدعم والمساعدة

إذا واجهت أي مشكلة:
1. تحقق من السجلات: `storage/logs/laravel.log`
2. استخدم: `php artisan tinker` للاختبار
3. تحقق من صحة البيانات المدخلة

---

**ملاحظة:** يجب إنشاء الملفات الفريمية (Blade Views) بناءً على الأمثلة المعطاة أعلاه.
