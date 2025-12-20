<?php

echo "\n=== 🧪 اختبار الصفحات الجديدة ===\n\n";

$base_url = 'http://127.0.0.1:8000';

$pages = [
    'الرئيسية' => '/',
    'عن المنصة' => '/about',
    'الخدمات' => '/services',
    'التواصل' => '/contact',
];

foreach ($pages as $name => $path) {
    $url = $base_url . $path;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    
    curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    $status = ($http_code == 200) ? '✅ OK' : "❌ Error ($http_code)";
    
    printf("%-20s %-15s %s\n", $name, $path, $status);
}

echo "\n=== ✅ اختبار الصفحات اكتمل ===\n\n";
?>
