<?php

/**
 * Comprehensive Fix for Public Pages
 * Fixes:
 * 1. Remove {{ __() }} from inside strings in @php blocks
 * 2. Fix Arabic character corruption ('لا' → 'No')
 * 3. Clean up malformed concatenations
 */

$files = [
    'resources/views/pages/public/programs.blade.php',
    'resources/views/pages/public/events.blade.php',
    'resources/views/pages/public/contact.blade.php',
    'resources/views/pages/public/home.blade.php',
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

    // Fix 1: Remove {{ __() }} from inside strings
    // Pattern: 'text {{ __('...') }} more text' => 'text more text'
    $content = preg_replace(
        "/'([^']*?)\\{\\{\\s*__\\([^)]+\\)\\s*\\}\\}([^']*?)'/",
        "'$1$2'",
        $content,
        -1,
        $count1
    );

    // Fix 2: Fix concatenation patterns like __('...') . 'text'
    // Pattern: {{ __('...') . 'text' => just remove the concatenation
    $content = preg_replace(
        "/\\{\\{\\s*__\\(([^)]+)\\)\\s*\\.\\s*'([^']+)'\\s*\\}\\}/",
        "",
        $content,
        -1,
        $count2
    );

    // Fix 3: Restore Arabic 'لا' that was corrupted
    $arabicFixes = [
        'لالا' => 'لا',  // Double corruption
        'ال{{ __' => 'لا{{ __',  // When at start
        'وال{{ __' => 'ولا{{ __',
        ' ال{{ __' => ' لا{{ __',
        'لالابتكارية' => 'الابتكارية',
        'لالاقتصاد' => 'الاقتصاد',
        'لالاستفادة' => 'الاستفادة',
        'ال{{ __' => 'لا',  // Generic fix
        '{{ __' . "('common.general.no') }}" => 'لا',
        '{{ __' . "('common.general.no') . 'زمة'" => 'اللازمة',
        'ال{{ __' . "('common.general.no') }}" => 'لا',
        'مجا{{ __' . "('common.general.no') }}" => 'مجالات',
        'خ{{ __' . "('common.general.no') }}" => 'خلال',
        'اطNoع' => 'اطلع',
    ];

    $count3 = 0;
    foreach ($arabicFixes as $search => $replace) {
        $beforeCount = substr_count($content, $search);
        $content = str_replace($search, $replace, $content);
        $afterCount = substr_count($content, $search);
        $count3 += ($beforeCount - $afterCount);
    }

    // Fix 4: Clean up remaining {{ __ }} patterns in strings
    // Remove any remaining translation calls from within strings
    $content = preg_replace(
        "/'([^']*?)\\{\\{[^}]+\\}\\}([^']*?)'/",
        "'$1$2'",
        $content,
        -1,
        $count4
    );

    // Fix 5: Fix specific patterns like "من خلال" that got broken
    $content = str_replace('{{ __' . "('common.time.from') }}", 'من', $content, $count5a);
    $content = str_replace('{{ __' . "('common.time.to') }}", 'إلى', $content, $count5b);
    $content = str_replace('{{ __' . "('modules.training.title') }}", 'التدريبية', $content, $count5c);
    $content = str_replace('{{ __' . "('modules.training.categories.workshop') }}", 'ورشة', $content, $count5d);
    $content = str_replace('{{ __' . "('modules.training.categories.training') }}", 'تدريب', $content, $count5e);
    $content = str_replace('{{ __' . "('common.tabs.arabic') }}", 'العربية', $content, $count5f);
    $content = str_replace('{{ __' . "('common.general.success') }}", 'النجاح', $content, $count5g);

    $count5 = $count5a + $count5b + $count5c + $count5d + $count5e + $count5f + $count5g;

    $totalChanges = $count1 + $count2 + $count3 + $count4 + $count5;

    if ($content !== $originalContent) {
        file_put_contents($file, $content);
        $filesFixed++;
        $totalFixes += $totalChanges;
        echo "✓ Fixed: $file ($totalChanges changes)\n";
        echo "  - Removed {{ __ }} from strings: $count1\n";
        echo "  - Fixed concatenations: $count2\n";
        echo "  - Restored Arabic text: $count3\n";
        echo "  - Cleaned remaining patterns: $count4\n";
        echo "  - Fixed specific translations: $count5\n";
    }
}

echo "\n";
echo "========================================\n";
echo "Public Pages Fix Complete!\n";
echo "========================================\n";
echo "Files fixed: $filesFixed\n";
echo "Total fixes: $totalFixes\n";
