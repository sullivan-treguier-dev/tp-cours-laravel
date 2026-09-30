<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Silber\Bouncer\Database\Ability;
use Silber\Bouncer\Database\Role;

class AccueilController extends Controller
{
    public function index (int $number): string {
        return "Je suis sur la page $number";
    }

    public function dashboard(): View {
        return view('dashboard', [
            'nbAbsences' => Absence::count(),
            'nbSalaries' => User::count(),
            'nbRoles' => Role::count(),
            'nbAbility' => Ability::count()
        ]);
    }
}
