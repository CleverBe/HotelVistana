<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_habitacion',
        'tipo',
        'precio',
        'piso',
        'wifi',
        'disponibilidad',
        'image',
    ];

    public function reservas()
    {
        return $this->belongsToMany(Reserva::class);
    }

    public function getImagenAttribute()
    {
        if ($this->image == null) {
            return 'noimage.jpg';
        }
        if (file_exists('storage/habitaciones/' . $this->image))
            return $this->image;
        else {
            return 'noimage.jpg';
        }
    }
}
