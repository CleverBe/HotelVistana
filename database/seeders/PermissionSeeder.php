<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Ver_Reportes',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Ver_Habitaciones',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Ver_Permisos',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Ver_Roles',
            'guard_name' => 'web'
        ]);
        Permission::create([  
            'name' => 'Ver_Usuarios',
            'guard_name' => 'web'
        ]);
        
        
        
    }
}
