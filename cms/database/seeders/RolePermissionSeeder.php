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
        $roleEditor = Role::create(['name' => 'court']);
        $roleStation = Role::create(['name' => 'investigator']);
        $roleUser = Role::create(['name' => 'user']);
        // permission list as array
        $permissions = [
            // blog
            'case-create','case-approve','case-investigate','view-today-case','view-case-profile',
            // 
            'fix-hearing-date','view-hearing-date','edit-defendant',
            // 
            'view-register','view-case-type','view-setting','add-properties','sent-for-investigation','view-arrested-defendant-list',
            'investigate-case',
        // 
        'role.create','role.view','role.approve','role.edit','role.delete',
    'view-case-list','view-arrest-warent-list','view-witness-list','view-setting'];
            
        // assign permissions
        // $permission = Permission::create(['name' => 'edit articles']);

        for($i=0;$i<count($permissions);$i++){
            $permission = Permission::create(['name' => $permissions[$i]]);
            $roleSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperAdmin);
        }

    }
}
