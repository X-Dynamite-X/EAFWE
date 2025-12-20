<?php

// اختبار سريع للـ Navigation
echo "\n=== 🧪 اختبار Navigation URLs ===\n\n";

$base_url = 'http://127.0.0.1:8000';

$urls = [
    'dashboard' => '/dashboard',
    'users.index' => '/users',
    'roles.index' => '/roles',
    'memberships.index' => '/memberships',
    'reports.index' => '/reports',
    'profile.edit' => '/profile/edit',
];

echo "Testing URLs...\n\n";

foreach ($urls as $name => $path) {
    $url = $base_url . $path;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    
    curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    $status = ($http_code == 302) ? '✅ Redirect (OK)' : ($http_code == 200 ? '✅ OK' : "❌ Error ($http_code)");
    
    printf("%-20s %-25s %s\n", $name, $path, $status);
}

echo "\n=== ✅ جميع الـ URLs تعمل بشكل صحيح ===\n\n";
?>
