<?php

/**
 * Fix Nested Blade Syntax in Show Pages
 * Fixes: {{ $var ? '{{ __() }}' : '{{ __() }}' }}
 * To: {{ $var ? __() : __() }}
 */

$files = [
    'resources/views/pages/dashboard/training/show.blade.php',
    'resources/views/pages/dashboard/entrepreneurship/show.blade.php',
    'resources/views/pages/dashboard/marketing/show.blade.php',
    'resources/views/pages/dashboard/communication/show.blade.php',
    'resources/views/pages/dashboard/portal-opportunities/show.blade.php',
    'resources/views/pages/dashboard/participation/show.blade.php',
    'resources/views/pages/dashboard/files/show.blade.php',
];

$totalFixes = 0;
$filesFixed = 0;

foreach ($files as $file) {
    if (!file_exists($file)) {
        echo "⚠ File not found: $file\n";
        continue;
    }

    $content = file_get_contents($file);
    $originalContent = $content;

    // Fix nested Blade syntax in ternary operators
    // Pattern: {{ $var ? '{{ __('...') }}' : '{{ __('...') }}' }}
    // Replace with: {{ $var ? __('...') : __('...') }}

    $content = preg_replace(
        "/\\{\\{\\s*([^?]+)\\?\\s*'\\{\\{\\s*__\\(([^)]+)\\)\\s*\\}\\}'\\s*:\\s*'\\{\\{\\s*__\\(([^)]+)\\)\\s*\\}\\}'\\s*\\}\\}/",
        "{{ $1 ? __($2) : __($3) }}",
        $content,
        -1,
        $count
    );

    $totalFixes += $count;

    if ($content !== $originalContent) {
        file_put_contents($file, $content);
        $filesFixed++;
        echo "✓ Fixed: $file ($count changes)\n";
    }
}

echo "\n";
echo "========================================\n";
echo "Show Pages Syntax Fix Complete!\n";
echo "========================================\n";
echo "Files fixed: $filesFixed\n";
echo "Total fixes: $totalFixes\n";
