<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Switch the application language
     */
    public function switch($locale)
    {
        // Validate locale
        $supported = ['ar', 'en'];
        
        if (!in_array($locale, $supported)) {
            $locale = 'ar';
        }

        // Store in session
        session(['locale' => $locale]);

        // Set app locale
        app()->setLocale($locale);

        return back();
    }
}
