#!/bin/bash

# EAFWE - Setup Script
# سكريبت تثبيت وتشغيل المشروع بسهولة

echo "🚀 بدء تثبيت EAFWE..."

# 1. تثبيت المكتبات PHP
echo "📦 تثبيت مكتبات Composer..."
composer install

# 2. تثبيت مكتبات Node
echo "📦 تثبيت مكتبات npm..."
npm install

# 3. إنشاء ملف البيئة
echo "⚙️ إعداد ملف البيئة..."
if [ ! -f .env ]; then
    cp .env.example .env
    php artisan key:generate
fi

# 4. تشغيل Migrations
echo "🗄️ تشغيل قاعدة البيانات..."
php artisan migrate:fresh --seed

# 5. بناء Assets
echo "🎨 بناء Assets..."
npm run build

# 6. إنشاء رابط Storage
echo "📁 إعداد Storage..."
php artisan storage:link

echo ""
echo "✅ تم التثبيت بنجاح!"
echo ""
echo "👤 بيانات الدخول:"
echo "   Admin: admin@eafwe.com / password123"
echo "   Staff: staff@eafwe.com / password123"
echo ""
echo "🌐 للبدء في التطوير، شغّل:"
echo "   php artisan serve"
echo "   npm run dev"
echo ""
