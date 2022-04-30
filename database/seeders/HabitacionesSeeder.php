<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class HabitacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'numero_habitacion' => '1',
            'tipo' => 'NORMAL',
            'precio' => '50',
            'piso' => '2',
            'wifi' => 'SI',
            'disponibilidad' => 'SI',
        ]);
        Room::create([
            'numero_habitacion' => '2',
            'tipo' => 'MATRIMONIAL',
            'precio' => '90',
            'piso' => '2',
            'wifi' => 'SI',
            'disponibilidad' => 'SI',
        ]);
        Room::create([
            'numero_habitacion' => '3',
            'tipo' => 'NORMAL',
            'precio' => '50',
            'piso' => '2',
            'wifi' => 'SI',
            'disponibilidad' => 'SI',
        ]);
    }
}
