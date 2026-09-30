<?php

namespace App\Http\Controllers;

use App\Http\Repositories\RoleRepository;
use App\Http\Requests\RoleRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Silber\Bouncer\Database\Role;
use Silber\Bouncer\Database\Ability;

class RoleController extends Controller
{
    public const PATH_VIEWS = 'roles';

    public RoleRepository $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index(): View
    {
        return view(static::PATH_VIEWS . '.index', [
            'roles' => Role::all()
        ]);
    }

    public function create(): View
    {
        return $this->model(null);
    }

    public function store(RoleRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $this->roleRepository->create($validated);

        return redirect(route('role.store'))->with('success', 'Le rôle a été ajouté');
    }

    public function show(Role $role): View
    {
        return view('roles.show', [
            'role' => $role
        ]);
    }

    public function edit(Role $role): View
    {
        return $this->model($role);
    }

    public function update(RoleRequest $request, Role $role): RedirectResponse
    {
        $validated = $request->validated();

        $role->update([
            'name' => Str::slug($validated['title']),
            'title' => $validated['title']
        ]);

        return redirect(route('role.index'))->with('success', "Le rôle a été renommé !");
    }

    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();
        return redirect()->back()->with('success', "Le rôle a été supprimé !");
    }

    private function data(?Role $role): array
    {
        if ($role !== null) {
            $verifAbilities = $role->abilities()->pluck('name')->toArray();
        } else {
            $verifAbilities = [];
        }
        return [
            'role' => $role,
            'abilities' => Ability::all(),
            'verifAbilities' => $verifAbilities
        ];
    }

    private function model(?Role $role): View
    {
        return view(static::PATH_VIEWS . '.model', $this->data($role));
    }
}
