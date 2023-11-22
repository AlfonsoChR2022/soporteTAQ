<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Contraloria']);
        $role3 = Role::create(['name' => 'Cliente']);
        $role4 = Role::create(['name' => 'Soporte_hardware']);
        $role5 = Role::create(['name' => 'Soporte_software']);
        $role6 = Role::create(['name' => 'Soporte_BD']);
        
        Permission::create(['name' => 'home','description' => 'Ver el Dashboard'])->syncRoles([$role1,$role2,$role3,$role4,$role5,$role6]);

        Permission::create(['name' => 'ticket.index','description' => 'Ver listado de Tickets'])->syncRoles([$role1,$role3,$role4,$role5,$role6]);
        Permission::create(['name' => 'ticket.show','description' => 'Ver detalle de Tickets'])->syncRoles([$role1,$role3,$role4,$role5,$role6]);
        Permission::create(['name' => 'ticket.create','description' => 'Crear Tickets'])->syncRoles([$role1,$role3,$role4,$role5,$role6]);
        Permission::create(['name' => 'ticket.edit','description' => 'Editar Tickets'])->syncRoles([$role1,$role4,$role5,$role6]);
        Permission::create(['name' => 'ticket.update','description' => 'Modificar Tickets'])->syncRoles([$role1,$role4,$role5,$role6]);
        Permission::create(['name' => 'ticket.destroy','description' => 'Eliminar Tickets'])->syncRoles([$role1,$role4,$role5,$role6]);
        Permission::create(['name' => 'ticket.request','description' => 'Responder Tickets'])->syncRoles([$role1,$role4,$role5,$role6]);

        Permission::create(['name' => 'categoria.index','description' => 'Ver listado de Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'categoria.show','description' => 'Ver detalle de Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'categoria.create','description' => 'Crear Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'categoria.edit','description' => 'Editar Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'categoria.update','description' => 'Modificar Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'categoria.destroy','description' => 'Eliminar Categorias'])->syncRoles([$role1]);

        Permission::create(['name' => 'usuario.index','description' => 'Ver listado de Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuario.show','description' => 'Ver detalle de Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuario.create','description' => 'Crear Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuario.edit','description' => 'Editar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuario.update','description' => 'Modificar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuario.destroy','description' => 'Eliminar Usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'role.index','description' => 'Ver listado de Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'role.show','description' => 'Ver detalle de Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'role.create','description' => 'Crear Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'role.edit','description' => 'Editar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'role.update','description' => 'Modificar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'role.destroy','description' => 'Eliminar Roles'])->syncRoles([$role1]);

        Permission::create(['name' => 'reportes.index','description' => 'Ver Reportes'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'reportes.show','description' => 'Ver detalle de ticket'])->syncRoles([$role1,$role2]);

    }
}
