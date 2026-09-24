<?php

namespace App\Http\Controllers;

use BcMath\Number;
use Illuminate\Http\Request;

class MathController extends Controller
{
    public function addition(float|int $a = 0, float|int $b = 0): string
    {
        return $this->affichage($a, $b, "+", $a + $b);
    }

    public function soustraction(float|int $a = 0, float|int $b = 0): string
    {
        return $this->affichage($a, $b, "-", $a - $b);
    }

    public function multiplication(float|int $a = 0, float|int $b = 0): string
    {
        return $this->affichage($a, $b, "*", $a * $b);
    }

    public function division(float|int $a = 1, float|int $b = 1)
    {
        if (intval($a) === 0 || intval($b) === 0) {
            return "Il est impossible de le diviser par 0";
        }
        return $this->affichage($a, $b, "/", $a / $b);
    }

    private function affichage(float|int $a, float|int $b, string $operation, float|int $result): string
    {
        return "Le resultat de <u><strong>$a $operation $b</strong></u> est <strong>$result</strong>";
    }
}
