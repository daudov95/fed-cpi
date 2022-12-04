<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Excursion extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price', 'including', 'program', 'age', 'place', 'start_place', 'end_place'];

    public function images(): HasMany
    {
        return $this->hasMany(ExcursionImage::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(ExcursionSchedule::class);
    }
}
