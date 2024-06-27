<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' =>  'superadmin123'
        ]);
    
        $user2 = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin123'
        ]);

        $role1 = Role::create(['name' => 'Superadmin']);
        $role2 = Role::create(['name' => 'Admin']);

        // user
        Permission::create(['name'=>'ver usuario'])->assignRole($role1);
        Permission::create(['name'=>'crear usuario'])->assignRole($role1);
        Permission::create(['name'=>'actualizar usuario'])->assignRole($role1);
        Permission::create(['name'=>'eliminar usuario'])->assignRole($role1);

        //Diligenciamiento
        Permission::create(['name'=>'ver diligencimiento'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'crear diligencimiento'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'actualizar diligencimiento'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'eliminar diligencimiento'])->syncRoles([$role1, $role2]);

        $user1->assignRole($role1);
        $user2->assignRole($role2);
        
    }
}
