<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create roles
        $role = Role::create(['name' => 'admin']);
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);
        // permission list as array
        $permissions = [
            // blog
            'blog.create','blog.view','blog.approve','blog.edit','blog.delete',
            // 
            'profile.create','profile.view','profile.approve','profile.edit','profile.delete',
        // 
        'role.create','role.view','role.approve','role.edit','role.delete'];
            
        // assign permissions
        // $permission = Permission::create(['name' => 'edit articles']);

        for($i=0;$i<count($permissions);$i++){
            $permission = Permission::create(['name' => $permissions[$i]]);
            $roleSuperAdmin->givePermissionTo($permission);
$permission->assignRole($roleSuperAdmin);
        }

    }
}
