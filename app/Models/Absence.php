<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = [
        "date_debut",
        "date_fin",
        "motif",
        "user_id",
    ];

    protected function user() {
        return $this->belongsTo(User::class);
    }

    protected function dateDebut(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value
                ? Carbon::parse($value)->format('d/m/Y H\hi')
                : null,

            set: fn ($value) => $value
                ? Carbon::createFromFormat('d/m/Y H\hi', $value)
                    ->format('Y-m-d H:i:s')
                : null,
        );
    }

    protected function dateFin(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value
                ? Carbon::parse($value)->format('d/m/Y H\hi')
                : null,

            set: fn ($value) => $value
                ? Carbon::createFromFormat('d/m/Y H\hi', $value)
                    ->format('Y-m-d H:i:s')
                : null,
        );
    }
}
