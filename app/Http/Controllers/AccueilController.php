<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AccueilController extends Controller
{
    public function index (int $number): string {
        return "Je suis sur la page $number";
    }
}
