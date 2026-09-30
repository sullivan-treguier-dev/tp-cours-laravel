<?php

namespace App\Http\Repositories;

use Illuminate\Support\Str;
use Silber\Bouncer\BouncerFacade;
use Silber\Bouncer\Database\Role;

class RoleRepository
{
    public function create(array $validated)
    {
        $role = new Role();
        $this->save($validated, $role);
    }

    private function save(array $validated, Role $role)
    {
        $role->name = Str::slug($validated['title']);
        $role->title = $validated['title'];
        $role->save();

        if ($validated['abilities']) {
            foreach($validated['abilities'] as $ability) {
                BouncerFacade::allow($validated['name'])->to($ability);
            }
        }
    }

}
