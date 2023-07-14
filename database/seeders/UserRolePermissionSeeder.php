<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions configuration
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'car']);
        Permission::create(['name' => 'car/location']);
        Permission::create(['name' => 'car/lisence']);
        Permission::create(['name' => 'blog']);
        Permission::create(['name' => 'blog/category']);
        Permission::create(['name' => 'user']);
        Permission::create(['name' => 'user/role']);
        Permission::create(['name' => 'user/permission']);
        Permission::create(['name' => 'rent']);
        Permission::create(['name' => 'rent/payment']);
        Permission::create(['name' => 'setting']);
        Permission::create(['name' => 'setting/menu']);
        Permission::create(['name' => 'setting/service']);
        Permission::create(['name' => 'booking']);

        //create roles configuration

        //create user configuration


        //create car configuration


        // action for publish and unpublish
        // Permission::create(['name' => 'publish posts']);
        // Permission::create(['name' => 'unpublish posts']);

        // defaul value for user
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        //create user
        $userSuperadmin = User::create(array_merge([
            'name' => 'superadmin',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com'
        ], $default_user_value));

        $userAdmin = User::create(array_merge([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com'
        ], $default_user_value));

        $userWriter = User::create(array_merge([
            'name' => 'writer',
            'username' => 'writer',
            'email' => 'writer@gmail.com'
        ], $default_user_value));

        //create role
        $superadminRole = Role::create(['name' => 'superadmin']);
        $adminRole = Role::create(['name' => 'admin']);
        $writerRole = Role::create(['name' => 'writer']);

        //grant permission for admin for car configuration
        $adminRole->givePermissionTo('dashboard');
        $adminRole->givePermissionTo('car');
        $adminRole->givePermissionTo('car/location');
        $adminRole->givePermissionTo('car/lisence');
        $adminRole->givePermissionTo('blog');
        $adminRole->givePermissionTo('blog/category');
        $adminRole->givePermissionTo('user');
        $adminRole->givePermissionTo('user/role');
        $adminRole->givePermissionTo('user/permission');
        $adminRole->givePermissionTo('rent');
        $adminRole->givePermissionTo('rent/payment');
        $adminRole->givePermissionTo('setting');
        $adminRole->givePermissionTo('setting/menu');
        $adminRole->givePermissionTo('setting/service');
        $adminRole->givePermissionTo('booking');

        //gift role admin to dummy admin
        $userAdmin->assignRole($adminRole);
        $userSuperadmin->assignRole($superadminRole);
        $userWriter->assignRole($writerRole);
    }
}
