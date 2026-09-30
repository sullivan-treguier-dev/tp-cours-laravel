<?php

namespace App\Http\Repositories;

use App\Models\User;
use Silber\Bouncer\BouncerFacade;

class SalarieRepository
{
    public function create(array $validated): void
    {
        $salarie = new User();
        $this->save($validated, $salarie);
    }

    public function update(array $validated, User $salarie): void
    {
        $this->save($validated, $salarie);
    }

    private function save(array $validated, User $salarie): void
    {
        if ($salarie->getRoles()->isNotEmpty()) {
            BouncerFacade::sync($salarie)->roles([]);
        }

        $salarie->nom = $validated['nom'];
        $salarie->prenom = $validated['prenom'];
        $salarie->email = $validated['email'];
        if ($validated["password"]) {
            $salarie->password = $validated['password'];
        }
        $salarie->save();

        BouncerFacade::assign($validated['role'])->to($salarie);
    }
}
