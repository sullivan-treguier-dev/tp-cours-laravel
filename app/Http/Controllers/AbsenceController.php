<?php

namespace App\Http\Controllers;

use App\Http\Repositories\AbsenceRepository;
use App\Http\Requests\AbsenceRequest;
use App\Models\Absence;
use App\Models\User;

class AbsenceController extends Controller
{
    public const PATH_VIEWS = 'absences';

    public AbsenceRepository $absenceRepository;

    public function __construct(AbsenceRepository $absenceRepository)
    {
        $this->absenceRepository = $absenceRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(static::PATH_VIEWS . '.index', [
            'absences' => $this->absenceRepository->roleViewOptions()
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
    public function store(AbsenceRequest $request)
    {
        $validated = $request->validated();

        $this->absenceRepository->create($validated);

        return redirect(route('absence.index'))->with('success', "L'absence a été ajouté !");
    }

    /**
     * Display the specified resource.
     */
    public function show(Absence $absence)
    {
        return view(static::PATH_VIEWS . '.show', ['absence' => $absence]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absence $absence)
    {
        return $this->model($absence);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AbsenceRequest $request, Absence $absence)
    {
        $validated = $request->validated();

        $this->absenceRepository->update($validated, $absence);

        return redirect(route('absence.index'))->with('success', "L'absence n°{$absence->id} a été modifié !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absence $absence)
    {
        $absence->delete();
        return redirect()->back()->with('success', "L'absence a été retiré !");
    }

    private function data(?Absence $absence) {
        return [
            'absence' => $absence,
            'salaries' => User::all()
        ];
    }

    private function model(?Absence $absence) {
        return view(static::PATH_VIEWS . '.model', $this->data($absence));
    }
}
