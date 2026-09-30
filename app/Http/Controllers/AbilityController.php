<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbilityRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Silber\Bouncer\Database\Ability;

class AbilityController extends Controller
{
    public const PATH_VIEWS = 'abilities';

    public function index(): View
    {
        return view(static::PATH_VIEWS . '.index', [
            'abilities' => Ability::all()
        ]);
    }

    public function create(): View
    {
        return $this->model(null);
    }

    public function store(AbilityRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Ability::create([
            'name' => Str::slug($validated['title']),
            'title' => $validated['title'],
        ]);

        return redirect(route('ability.index'))->with('success', "L'abilitation a été ajouté !");
    }

    public function edit(Ability $ability): View
    {
        return $this->model($ability);
    }

    public function update(AbilityRequest $request, Ability $ability): RedirectResponse
    {
        $validated = $request->validated();

        $ability->update([
            'name' => Str::slug($validated['title']),
            'title' => $validated['title']
        ]);

        return redirect(route('ability.index'))->with('success', "L'abilitation a été renommé !");
    }

    public function destroy(Ability $ability): RedirectResponse
    {
        $ability->delete();
        return redirect()->back()->with('success', "L'abilitation a été supprimé !");
    }

    private function data(?Ability $ability): array
    {
        return [
            'ability' => $ability
        ];
    }

    private function model(?Ability $ability): View
    {
        return view(static::PATH_VIEWS . ".model", $this->data($ability));
    }
}
