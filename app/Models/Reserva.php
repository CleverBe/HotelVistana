<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_dias',
        'total',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'user_id'
    ];

    public function habitaciones()
    {
        return $this->belongsToMany(Room::class);
    }
}
