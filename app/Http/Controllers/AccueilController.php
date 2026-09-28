<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\User;
use Illuminate\Contracts\View\View;

class AccueilController extends Controller
{
    public function index (int $number): string {
        return "Je suis sur la page $number";
    }

    public function dashboard(): View {
        return view('dashboard', [
            'nbAbsence' => Absence::count(),
            'nbSalarie' => User::count()
        ]);
    }
}
