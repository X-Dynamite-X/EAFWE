# البنية المعمارية لنظام إدارة محتوى لوحة التحكم

## 1️⃣ الهيكل الكامل

```
┌─────────────────────────────────────────────────────────────┐
│                    لوحة تحكم الأعضاء                       │
│               (Member Dashboard Pages)                      │
└────────────┬────────────────────────────────────────────────┘
             │
    ┌────────┴────────┬──────────┬──────────┬─────────┬──────────────┐
    │                 │          │          │         │              │
    ▼                 ▼          ▼          ▼         ▼              ▼
Training         Entrepren.    Participation  Marketing  Member     Communication
Programs         Programs      Opportunities  Resources  Files      & Announcements
    │                 │          │          │         │              │
    │                 │          │          │         │              │
    └────────┬────────┴──────────┴──────────┴─────────┴──────────────┘
             │
    ┌────────▼────────────────────────────────────────────┐
    │         قاعدة البيانات (7 جداول)                   │
    │     Database Driven System                          │
    └────────┬─────────────────────────────────────────────┘
             │
    ┌────────▼─────────────────────────────────────────────┐
    │    متحكمات الإدارة (7 Controllers)                  │
    │   Admin Management Controllers                       │
    │  (Create, Read, Update, Delete)                     │
    └──────────────────────────────────────────────────────┘
```

## 2️⃣ دورة طلب واحد

```
المستخدم
   │
   ├─ عضو عادي
   │  └─ يريد عرض المحتوى
   │     └─ GET /dashboard/training
   │        └─ TrainingProgramController@index()
   │           └─ TrainingProgram::where('is_active', true)->get()
   │              └─ عرض القالب (View)
   │
   └─ مشرف/Admin
      └─ يريد إدارة المحتوى
         └─ متحقق من الصلاحيات
            │
            ├─ GET /dashboard/training/manage
            │  └─ TrainingProgramController@manage() + 'manage training programs' permission
            │     └─ عرض قائمة الإدارة
            │
            ├─ POST /dashboard/training
            │  └─ TrainingProgramController@store() + validation
            │     └─ TrainingProgram::create()
            │        └─ حفظ في قاعدة البيانات
            │
            ├─ PATCH /dashboard/training/{id}
            │  └─ TrainingProgramController@update()
            │     └─ $program->update()
            │        └─ تحديث في قاعدة البيانات
            │
            └─ DELETE /dashboard/training/{id}
               └─ TrainingProgramController@destroy()
                  └─ $program->delete()
                     └─ حذف من قاعدة البيانات
```

## 3️⃣ طبقات التطبيق

```
┌─────────────────────────────────────┐
│    طبقة الواجهة (Views/Blade)      │
│  - index.blade.php (عرض)           │
│  - manage.blade.php (إدارة)        │
│  - create.blade.php (إضافة)        │
│  - edit.blade.php (تعديل)          │
└────────────┬────────────────────────┘
             │
┌────────────▼────────────────────────┐
│  طبقة التوجيه (Routes)             │
│  - GET /dashboard/training          │
│  - POST /dashboard/training         │
│  - PATCH /dashboard/training/{id}   │
│  - DELETE /dashboard/training/{id}  │
└────────────┬────────────────────────┘
             │
┌────────────▼────────────────────────────────────┐
│   طبقة المتحكمات (Controllers)               │
│  - index() - عرض القائمة                      │
│  - manage() - إدارة العناصر                   │
│  - create() - نموذج إضافة                    │
│  - store() - حفظ بيانات جديدة                 │
│  - show() - عرض عنصر واحد                     │
│  - edit() - نموذج تعديل                      │
│  - update() - تحديث البيانات                  │
│  - destroy() - حذف البيانات                   │
└────────────┬────────────────────────────────────┘
             │
┌────────────▼────────────────────────────────────┐
│   طبقة النماذج (Models)                       │
│  - TrainingProgram                             │
│  - EntrepreneurshipProgram                    │
│  - ParticipationOpportunity                   │
│  - MarketingResource                          │
│  - MemberFile                                  │
│  - Communication                               │
│  - PortalOpportunity                          │
└────────────┬────────────────────────────────────┘
             │
┌────────────▼────────────────────────────────────┐
│   طبقة قاعدة البيانات (Database)             │
│  - training_programs                           │
│  - entrepreneurship_programs                  │
│  - participation_opportunities                │
│  - marketing_resources                        │
│  - member_files                                │
│  - communications                              │
│  - portal_opportunities                       │
└────────────────────────────────────────────────┘
```

## 4️⃣ مثال تفصيلي: إضافة برنامج تدريب جديد

```
1. المستخدم (Admin/Staff)
   │
   └─> يضغط على: "إضافة برنامج جديد"
       │
       └─> يذهب إلى: /dashboard/training/create
           │
           ├─> التحقق: هل المستخدم مسجل دخول؟ (middleware: auth)
           │  └─> نعم ✓
           │
           ├─> التحقق: هل لديه صلاحية 'manage training programs'?
           │  └─> نعم ✓
           │
           └─> TrainingProgramController@create()
               │
               └─> return view('pages.dashboard.training.create')
                   │
                   └─> عرض نموذج HTML

2. ملء النموذج
   │
   ├─ Title: "تدريب إدارة المشاريع"
   ├─ Slug: "project-management-training"
   ├─ Description: "برنامج شامل لإدارة المشاريع"
   ├─ Content: "محتوى البرنامج..."
   ├─ Category: "training"
   └─ Image URL: "https://..."

3. الضغط على: "حفظ"
   │
   └─> POST /dashboard/training
       │
       ├─> التحقق: auth + permission ✓
       │
       └─> TrainingProgramController@store()
           │
           ├─> Validation:
           │   ├─ title: required, max:255
           │   ├─ slug: required, unique
           │   ├─ description: required
           │   ├─ content: required
           │   ├─ category: in:training,workshop,seminar
           │   └─ ...
           │
           ├─> إذا كانت البيانات صحيحة:
           │   │
           │   └─> TrainingProgram::create($validated)
           │       │
           │       └─> إدراج في قاعدة البيانات
           │           │
           │           ├─ INSERT INTO training_programs (
           │           │    title,
           │           │    slug,
           │           │    description,
           │           │    content,
           │           │    image_url,
           │           │    category,
           │           │    is_active,
           │           │    order,
           │           │    created_at,
           │           │    updated_at
           │           │  ) VALUES (...)
           │           │
           │           └─> نجاح ✓
           │
           └─> إعادة التوجيه إلى: /dashboard/training/manage
               │
               └─> عرض الرسالة: "تم الإضافة بنجاح"
```

## 5️⃣ هيكل ملفات المشروع

```
EAFWE/
├── app/
│   ├── Models/
│   │   ├── TrainingProgram.php
│   │   ├── EntrepreneurshipProgram.php
│   │   ├── ParticipationOpportunity.php
│   │   ├── MarketingResource.php
│   │   ├── MemberFile.php
│   │   ├── Communication.php
│   │   └── PortalOpportunity.php
│   │
│   └── Http/
│       └── Controllers/
│           ├── TrainingProgramController.php
│           ├── EntrepreneurshipProgramController.php
│           ├── ParticipationOpportunityController.php
│           ├── MarketingResourceController.php
│           ├── MemberFileController.php
│           ├── CommunicationController.php
│           └── PortalOpportunityController.php
│
├── database/
│   ├── migrations/
│   │   ├── 2026_01_15_000001_create_training_programs_table.php
│   │   ├── 2026_01_15_000002_create_entrepreneurship_programs_table.php
│   │   ├── 2026_01_15_000003_create_participation_opportunities_table.php
│   │   ├── 2026_01_15_000004_create_marketing_resources_table.php
│   │   ├── 2026_01_15_000005_create_member_files_table.php
│   │   ├── 2026_01_15_000006_create_communications_table.php
│   │   └── 2026_01_15_000007_create_portal_opportunities_table.php
│   │
│   └── seeders/
│       ├── TrainingProgramSeeder.php
│       ├── EntrepreneurshipProgramSeeder.php
│       ├── ParticipationOpportunitySeeder.php
│       ├── MarketingResourceSeeder.php
│       ├── MemberFileSeeder.php
│       ├── CommunicationSeeder.php
│       ├── PortalOpportunitySeeder.php
│       └── DatabaseSeeder.php (محدث)
│
├── resources/
│   └── views/
│       └── pages/
│           └── dashboard/
│               ├── training/
│               │   ├── index.blade.php
│               │   ├── manage.blade.php
│               │   ├── create.blade.php
│               │   ├── edit.blade.php
│               │   └── show.blade.php
│               ├── entrepreneurship/
│               ├── participation/
│               ├── marketing/
│               ├── files/
│               ├── communication/
│               └── portal-opportunities/
│
├── routes/
│   └── web.php (محدث)
│
└── ... (الملفات الأخرى)
```

## 6️⃣ نماذج البيانات

### جدول training_programs
```
┌────┬──────────────────────────┬────────────────────────┬────────────┐
│ id │ title                    │ slug                   │ category   │
├────┼──────────────────────────┼────────────────────────┼────────────┤
│ 1  │ Business Management      │ business-management    │ training   │
│ 2  │ Digital Marketing        │ digital-marketing      │ workshop   │
│ 3  │ Leadership Seminar       │ leadership-seminar     │ seminar    │
└────┴──────────────────────────┴────────────────────────┴────────────┘

├───────────────┬──────────────┬──────────┬──────────────────┬────────┤
│ description   │ content      │ image... │ is_active        │ order  │
├───────────────┼──────────────┼──────────┼──────────────────┼────────┤
│ تدريب الأعمال │ <p>محتوى</p>│ url      │ 1 (نشط)          │ 1      │
│ ...           │ ...          │ ...      │ ...              │ ...    │
└───────────────┴──────────────┴──────────┴──────────────────┴────────┘
```

## 7️⃣ تدفق الصلاحيات

```
المستخدم
   │
   ├─> تسجيل الدخول
   │   └─> auth middleware ✓
   │
   ├─> الوصول إلى /dashboard/training/manage
   │   └─> permission middleware: 'manage training programs'
   │       │
   │       ├─> إذا Admin → مسموح ✓
   │       ├─> إذا Staff → مسموح ✓
   │       └─> إذا Member → مرفوع ✗
```

## 8️⃣ العمليات الأساسية

```
CREATE (إضافة جديد)
   GET /create          → عرض النموذج
   POST /              → حفظ البيانات

READ (عرض البيانات)
   GET /               → عرض القائمة
   GET /{id}           → عرض تفصيل واحد

UPDATE (تعديل)
   GET /{id}/edit      → عرض نموذج التعديل
   PATCH /{id}         → تحديث البيانات

DELETE (حذف)
   DELETE /{id}        → حذف البيانات
```

## 9️⃣ المزايا المعمارية

```
✅ Separation of Concerns
   - Views منفصلة عن Models
   - Controllers توجه البيانات
   - Routes تحدد الوصول

✅ DRY Principle (Don't Repeat Yourself)
   - جميع Controllers تتبع نفس النمط
   - جميع Models متشابهة
   - إعادة استخدام الوظائف

✅ Security
   - Middleware للتحقق من الهوية
   - Permissions للتحكم في الوصول
   - Validation للتحقق من البيانات
   - CSRF protection تلقائياً

✅ Scalability
   - سهل إضافة موارد جديدة
   - قابل للتوسع بسهولة
   - نمط معياري يسهل الصيانة
```

## 🔟 خريطة الطريق (Road Map)

```
الآن ✅
  ├─ 7 جداول قاعدة بيانات
  ├─ 7 Models
  ├─ 7 Controllers
  ├─ 7 Seeders
  └─ مسارات محدثة

التالي 📝
  ├─ إنشاء Views (قوالب)
  ├─ تصميم الواجهة
  ├─ تخصيص النماذج
  └─ اختبار شامل

المستقبل 🚀
  ├─ إضافة موارد جديدة
  ├─ تطوير متقدم
  ├─ تحسينات الأداء
  └─ نشر في الإنتاج
```

---

هذا الهيكل يوفر نظام احترافي وقابل للتوسع وسهل الصيانة! 🎉
