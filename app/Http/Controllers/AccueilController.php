<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class AccueilController extends Controller
{
    public function index (int $number): string {
        return "Je suis sur la page $number";
    }

    public function dashboard(): View {
        return view('dashboard');
    }
}
