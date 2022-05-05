<?php

namespace Database\Seeders;

use App\Models\ModelHasRoles;
use Illuminate\Database\Seeder;

class ModelHasRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelHasRoles::create([     /* CLEVER - ROL ADMIN */
            'role_id' => 1, 
            'model_type' => 'App\Models\User',
            'model_id' => 1,
        ]);
        ModelHasRoles::create([     /* JOSE - ROL ADMIN */
            'role_id' => 1,
            'model_type' => 'App\Models\User',
            'model_id' => 2,
        ]);
        ModelHasRoles::create([     /* PEDRO - ROL EMPLEADO */
            'role_id' => 2,
            'model_type' => 'App\Models\User',
            'model_id' => 3,
        ]);
        ModelHasRoles::create([     /* ANDRES - ROL HUESPED */
            'role_id' => 3,
            'model_type' => 'App\Models\User',
            'model_id' => 4,
        ]);
    }
}