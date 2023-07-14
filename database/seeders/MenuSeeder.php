<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'name' => 'Dashboard',
            'slug' => 'dashboard',
            'controller' => 'DashboardController',
            'icon' => 'fas fa-fire',
            'sort' => '1',
            'mainMenu' => null,
        ]);
        Menu::create([
            'name' => 'Cars',
            'slug' => 'car',
            'controller' => 'CarController',
            'icon' => 'fas fa-car',
            'sort' => '2',
            'mainMenu' => null,
        ]);
        Menu::create([
            'name' => 'Blogs',
            'slug' => 'blog',
            'controller' => 'BlogController',
            'sort' => '3',
            'icon' => 'fas fa-columns',
            'mainMenu' => null,
        ]);
        Menu::create([
            'name' => 'Users',
            'slug' => 'user',
            'controller' => 'UserController',
            'icon' => 'fas fa-user',
            'sort' => '4',
            'mainMenu' => null,
        ]);
        Menu::create([
            'name' => 'Settings',
            'slug' => 'setting',
            'controller' => 'SettingController',
            'icon' => 'fas fa-tools',
            'sort' => '5',
            'mainMenu' => null,
        ]);
        Menu::create([
            'name' => 'Master Cars',
            'slug' => 'car',
            'controller' => 'CarController',
            'icon' => '',
            'sort' => '1',
            'mainMenu' => 2,
        ]);
        Menu::create([
            'name' => 'Master Blogs',
            'slug' => 'blog',
            'controller' => 'BlogController',
            'icon' => '',
            'sort' => '1',
            'mainMenu' => 3,
        ]);
        Menu::create([
            'name' => 'Categories',
            'slug' => 'category',
            'controller' => 'CategoryController',
            'icon' => '',
            'sort' => '2',
            'mainMenu' => 3,
        ]);
        Menu::create([
            'name' => 'Roles',
            'slug' => 'role',
            'controller' => 'RoleController',
            'icon' => '',
            'sort' => '1',
            'mainMenu' => 4,
        ]);
        Menu::create([
            'name' => 'Menus',
            'slug' => 'setting/menu',
            'controller' => 'MenuController',
            'icon' => '',
            'sort' => '1',
            'mainMenu' => 5,
        ]);
        Menu::create([
            'name' => 'Permissions',
            'slug' => 'permission',
            'controller' => 'PermissionController',
            'icon' => '',
            'sort' => '2',
            'mainMenu' => 4,
        ]);
        Menu::create([
            'name' => 'Web Setting',
            'slug' => 'setting',
            'controller' => 'SettingController',
            'icon' => '',
            'sort' => '2',
            'mainMenu' => 5,
        ]);
        Menu::create([
            'name' => 'Master User',
            'slug' => 'user',
            'controller' => 'UserController',
            'icon' => '',
            'sort' => '1',
            'mainMenu' => 4,
        ]);
        Menu::create([
            'name' => 'Location',
            'slug' => 'car/location',
            'controller' => 'LocationController',
            'icon' => '',
            'sort' => '2',
            'mainMenu' => 2,
        ]);
    }
}
