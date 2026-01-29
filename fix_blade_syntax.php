<?php

/**
 * Fix Blade Syntax Errors and Arabic Text Corruption
 *
 * This script fixes two critical issues:
 * 1. Removes {{ }} from __() calls inside @php blocks
 * 2. Fixes Arabic text corruption where 'لا' was replaced with 'No'
 */

$files = [
    'resources/views/pages/public/events.blade.php',
    'resources/views/pages/dashboard/memberships.blade.php',
    'resources/views/pages/dashboard/files.blade.php',
    'resources/views/pages/dashboard/participation/opportunities.blade.php',
    'resources/views/pages/dashboard/portal/opportunities.blade.php',
    'resources/views/pages/dashboard/portal/volunteering.blade.php',
    'resources/views/pages/dashboard/communication.blade.php',
    'resources/views/pages/dashboard/services/entrepreneurship.blade.php',
    'resources/views/pages/dashboard/services/training.blade.php',
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

    // Fix 1: Remove {{ }} from __() calls inside strings
    // Pattern: '{{ __('...')  }}' => __('...')
    $content = preg_replace(
        "/'\\{\\{\\s*__\\(([^)]+)\\)\\s*\\}\\}'/",
        "__($1)",
        $content,
        -1,
        $count1
    );

    // Fix 2: Fix Arabic text corruption - restore 'لا' that was replaced with 'No'
    // This is tricky because we need to identify where 'No' should be 'لا'
    // Common patterns:
    $arabicFixes = [
        'الإعNoنات' => 'الإعلانات',
        'ا{{ __' => 'لا{{ __',  // When 'لا' was at start and got replaced
        'وا{{ __' => 'ولا{{ __',
        '{{ __' . "('common.general.no') }}" => 'لا',  // Direct 'No' translation
    ];

    $count2 = 0;
    foreach ($arabicFixes as $search => $replace) {
        $beforeCount = substr_count($content, $search);
        $content = str_replace($search, $replace, $content);
        $afterCount = substr_count($content, $search);
        $count2 += ($beforeCount - $afterCount);
    }

    // Fix 3: After fixing {{ __ }}, we might have created new issues
    // Fix patterns like: __('...') }}ا  =>  __('...') . 'ا'
    $content = preg_replace(
        "/__\\(([^)]+)\\)\\s*\\}\\}([ا-ي]+)/u",
        "__($1) . '$2'",
        $content,
        -1,
        $count3
    );

    $totalChanges = $count1 + $count2 + $count3;

    if ($content !== $originalContent) {
        file_put_contents($file, $content);
        $filesFixed++;
        $totalFixes += $totalChanges;
        echo "✓ Fixed: $file ($totalChanges changes)\n";
    }
}

echo "\n";
echo "========================================\n";
echo "Blade Syntax Fix Complete!\n";
echo "========================================\n";
echo "Files fixed: $filesFixed\n";
echo "Total fixes: $totalFixes\n";
echo "\n";
echo "Next: Test the pages again to verify fixes\n";
