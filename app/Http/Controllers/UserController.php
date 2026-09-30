<?php

namespace App\Http\Controllers;

use App\Http\Repositories\SalarieRepository;
use App\Http\Requests\SalarieRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Silber\Bouncer\Database\Role;

class UserController extends Controller
{
    public const PATH_VIEWS = 'salaries';

    public SalarieRepository $salarieRepository;

    public function __construct(SalarieRepository $salarieRepository)
    {
        return $this->salarieRepository = $salarieRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view(static::PATH_VIEWS . '.index', [
            'salaries' => User::orderBy('nom')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return $this->model(null);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SalarieRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $this->salarieRepository->create($validated);

        return redirect(route('salarie.index'))->with('success', "Le salarié a été ajouté !");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $salarie): View
    {
        return $this->model($salarie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SalarieRequest $request, User $salarie): RedirectResponse
    {
        $validated = $request->validated();

        $this->salarieRepository->update($validated, $salarie);

        return redirect(route('salarie.index'))->with('success', "Le salarié a été modifié !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $salarie): RedirectResponse
    {
        $salarie->delete();
        return redirect()->back()->with('success', "Le salarié a été supprimé !");
    }

    private function data(?User $salarie): array
    {
        return [
            'salarie' => $salarie,
            'roles' => Role::all(),
        ];
    }

    private function model(?User $salarie): View
    {
        return view(static::PATH_VIEWS . '.model', $this->data($salarie));
    }
}
