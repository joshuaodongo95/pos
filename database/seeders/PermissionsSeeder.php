<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'user-list']);
        Permission::create(['name' => 'user-create']);
        Permission::create(['name' => 'user-edit']);
        Permission::create(['name' => 'user-delete']);

        Permission::create(['name' => 'role-list']);
        Permission::create(['name' => 'role-create']);
        Permission::create(['name' => 'role-edit']);
        Permission::create(['name' => 'role-delete']);

        Permission::create(['name' => 'permission-list']);
        Permission::create(['name' => 'permission-create']);
        Permission::create(['name' => 'permission-edit']);
        Permission::create(['name' => 'permission-delete']);

        Permission::create(['name' => 'product-list']);
        Permission::create(['name' => 'product-create']);
        Permission::create(['name' => 'product-edit']);
        Permission::create(['name' => 'product-delete']);


        Permission::create(['name' => 'order-list']);
        Permission::create(['name' => 'order-create']);
        Permission::create(['name' => 'order-edit']);
        Permission::create(['name' => 'order-delete']);



        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'seller']);
        
        $role1->givePermissionTo('order-create');

        $role2 = Role::create(['name' => 'cashier']);
        $role2->givePermissionTo('order-list');

        $role3 = Role::create(['name' => 'admin']);

        $role3->givePermissionTo('order-list');
        $role3->givePermissionTo('order-create');
        $role3->givePermissionTo('order-edit');
        $role3->givePermissionTo('order-delete');
        
        $role3->givePermissionTo('user-list');
        $role3->givePermissionTo('user-create');
        $role3->givePermissionTo('user-edit');
        $role3->givePermissionTo('user-delete');

        $role3->givePermissionTo('permission-list');
        $role3->givePermissionTo('permission-create');
        $role3->givePermissionTo('permission-edit');
        $role3->givePermissionTo('permission-delete');
        
        $role3->givePermissionTo('role-list');
        $role3->givePermissionTo('role-create');
        $role3->givePermissionTo('role-edit');
        $role3->givePermissionTo('role-delete');


        $role4 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'seller', 
            'email' => 'seller@test.com',
            'password' => bcrypt('seller')
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'cashier', 
            'email' => 'cashier@test.com',
            'password' => bcrypt('cashier')
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('admin')       
        ]);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'superadmin@test.com',
            'password' => bcrypt('superadmin')   
        ]);
        $user->assignRole($role4);
    }
}
