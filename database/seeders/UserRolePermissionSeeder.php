<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create([
            'name' => 'Administrador'
        ]);

        $customer = Role::create([
            'name' => 'Cliente'
        ]);

        $permission_user_index = Permission::create([
            'name' => 'Listar Usuarios',
            'route' => 'users.index'
        ]);

        $permission_user_create = Permission::create([
            'name' => 'Crear Usuarios',
            'route' => 'users.create'
        ]);

        $permission_user_store = Permission::create([
            'name' => 'Guardar Usuarios',
            'route' => 'users.store'
        ]);

        $permission_user_edit = Permission::create([
            'name' => 'Editar Usuarios',
            'route' => 'users.edit'
        ]);

        $permission_user_update = Permission::create([
            'name' => 'Actualizar Usuarios',
            'route' => 'users.update'
        ]);

        $admin->permissions()->attach([
            $permission_user_index->id,
            $permission_user_create->id,
            $permission_user_store->id,
            $permission_user_edit->id,
            $permission_user_update->id
        ]);

        $customer->permissions()->attach([
            $permission_user_index->id
        ]);

        $user_esteban = User::create([
            'name' => 'Esteban',
            'email' => 'esteban@esteban.com',
            'password' => bcrypt('esteban'),
            'role_id' => $admin->id
        ]);

        $user_jorge = User::create([
            'name' => 'Jorge',
            'email' => 'jorge@jorge.com',
            'password' => bcrypt('jorge'),
            'role_id' => $customer->id
        ]);
    }
}
