<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcursionSchedule extends Model
{
    use HasFactory;
    protected $fillable = ['time', 'price', 'excursion_id'];

    public function getCustomDateAttribute(): string
    {
        return date('d.m.Y H:i', (int)$this->time);
    }

}
