<?php

namespace App\Http\Repositories;

use App\Mail\AbsenceCreatedMail;
use App\Models\Absence;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;

class AbsenceRepository
{
    public function roleViewOptions(): Collection
    {
        if (auth()->user()->isA('admin')) {
            return Absence::with('user')->orderByDesc('id')->get();
        } else {
            return Absence::with('user')->orderByDesc('id')->where('user_id', auth()->user()->id)->get();
        }
    }

    public function create(array $validated): void
    {
        $absence = new Absence();
        $this->save($validated, $absence);
        Mail::to($absence->user)->send(new AbsenceCreatedMail($absence));
    }

    public function update(array $validated, Absence $absence): void
    {
        $this->save($validated, $absence);
    }

    private function save(array $validated, Absence $absence): void
    {
        $absence->date_debut = $validated['date_debut'];
        $absence->date_fin = $validated["date_fin"];
        $absence->motif = $validated['motif'];
        $absence->user_id = $validated['salarie_id'];
        $absence->save();
    }
}
