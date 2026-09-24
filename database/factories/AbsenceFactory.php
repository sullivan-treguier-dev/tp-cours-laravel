<?php

namespace Database\Factories;

use App\Models\Absence;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<Absence>
 */
class AbsenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randintUser = random_int(User::first()->id, User::orderBy('id', 'DESC')->first()->id);
        $user_id = User::where('id', $randintUser)->pluck('id')[0];
        return [
            'date_debut' => Carbon::now()->subHours(2),
            'date_fin' => Carbon::now()->addHours(2),
            'motif' => fake()->text(),
            'user_id' => $user_id,
        ];
    }
}
