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
       $role1 = Role::create(['name'=>'admin']);
       $role2 = Role::create(['name'=>'blogger']);

       Permission::create(['name' => 'admin.index'])->syncRoles([$role1, $role2]);

       Permission::create(['name' => 'admin.users.index'])->assignRole($role1);
       Permission::create(['name' => 'admin.users.edit'])->assignRole($role1);
       Permission::create(['name' => 'admin.users.update'])->assignRole($role1);

       Permission::create(['name' => 'admin.categories.index'])->assignRole($role1);
       Permission::create(['name' => 'admin.categories.create'])->assignRole($role1);
       Permission::create(['name' => 'admin.categories.edit'])->assignRole($role1);
       Permission::create(['name' => 'admin.categories.destroy'])->assignRole($role1);

       Permission::create(['name' => 'admin.tags.index'])->assignRole($role1);
       Permission::create(['name' => 'admin.tags.create'])->assignRole($role1);
       Permission::create(['name' => 'admin.tags.edit'])->assignRole($role1);
       Permission::create(['name' => 'admin.tags.destroy'])->assignRole($role1);

       Permission::create(['name' => 'admin.posts.index'])->syncRoles([$role1, $role2]);
       Permission::create(['name' => 'admin.posts.create'])->syncRoles([$role1, $role2]);
       Permission::create(['name' => 'admin.posts.edit'])->syncRoles([$role1, $role2]);
       Permission::create(['name' => 'admin.posts.destroy'])->syncRoles([$role1, $role2]);


    }
}
