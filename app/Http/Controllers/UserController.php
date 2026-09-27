<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalarieRequest;
use App\Models\Absence;
use App\Models\User;

class UserController extends Controller
{
    public const PATH_VIEWS = 'salaries';

    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view(static::PATH_VIEWS . '.index', [
            'salaries' => User::where('is_admin', false)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->model(null);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SalarieRequest $request)
    {
        $validated = $request->validated();

        Absence::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'password' => $validated['password']
        ]);

        return redirect(route('salarie.index'))->with('success', "Le salarié a été ajouté !");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $salarie)
    {
        return $this->model($salarie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SalarieRequest $request, User $salarie)
    {
        $validated = $request->validated();

        $salarie->update([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'password' => $validated['password']
        ]);

        return redirect(route('salarie.index'))->with('success', "Le salarié a été modifié !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $salarie)
    {
        $salarie->delete();
        return redirect()->back()->with('sucess', "Le salarié a été supprimés !");
    }

    private function data(?User $salarie) {
        return [
            'salarie' => $salarie
        ];
    }

    private function model(?User $salarie) {
        return view(static::PATH_VIEWS . '.model', $this->data($salarie));
    }
}
