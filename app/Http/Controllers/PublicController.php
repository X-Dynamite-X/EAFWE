<?php

namespace App\Http\Controllers;

use App\Models\EntrepreneurshipProgram;
use App\Models\TrainingProgram;

class PublicController extends Controller
{
    public function board()
    {
        return view('pages.public.about.board');
    }

    public function history()
    {
        return view('pages.public.about.history');
    }

    public function programs()
    {
        $training_programs = TrainingProgram::where('is_active', true)
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->take(8)
            ->get();
        $entrepreneurship_programs = EntrepreneurshipProgram::where('is_active', true)
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->take(8)
            ->get();

        return view('pages.public.programs', compact('training_programs', 'entrepreneurship_programs'));
    }
    public function TrainingProgramShow(TrainingProgram $training_program)
    {

        return view('pages.public.training-programs.show', compact('training_program'));
    }
      public function EntrepreneurshipProgramShow(EntrepreneurshipProgram $entrepreneurship_program)
    {

        return view('pages.public.entrepreneurship-programs.show', compact('entrepreneurship_program'));
    }


    public function faq()
    {
        return view('pages.public.faq');
    }
}
