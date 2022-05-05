<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\RoleHasPermissions;
use Illuminate\Database\Seeder;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 5; $x++) {       /* ADMIN */
            RoleHasPermissions::create([
                'permission_id' => $x,
                'role_id' => 1,
            ]);
        }

        for ($x = 1; $x <= 2; $x++) {     /* EMPLEADO*/
            RoleHasPermissions::create([
                'permission_id' => $x,
                'role_id' => 2,
            ]);
        }


    }
}
