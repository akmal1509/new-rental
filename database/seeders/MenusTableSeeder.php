<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Dashboard',
                'slug' => 'dashboard',
                'controller' => 'DashboardController',
                'icon' => 'fas fa-fire',
                'mainMenu' => NULL,
                'sort' => 1,
                'deleted_at' => NULL,
                'created_at' => '2023-06-30 18:48:08',
                'updated_at' => '2023-06-30 18:48:08',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Cars',
                'slug' => 'car',
                'controller' => 'CarController',
                'icon' => 'fas fa-car',
                'mainMenu' => NULL,
                'sort' => 2,
                'deleted_at' => NULL,
                'created_at' => '2023-06-30 18:48:09',
                'updated_at' => '2023-06-30 18:48:09',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Blogs',
                'slug' => 'blog',
                'controller' => 'BlogController',
                'icon' => 'fas fa-columns',
                'mainMenu' => NULL,
                'sort' => 3,
                'deleted_at' => NULL,
                'created_at' => '2023-06-30 18:48:09',
                'updated_at' => '2023-06-30 18:48:09',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Users',
                'slug' => 'user',
                'controller' => 'UserController',
                'icon' => 'fas fa-user',
                'mainMenu' => NULL,
                'sort' => 4,
                'deleted_at' => NULL,
                'created_at' => '2023-06-30 18:48:09',
                'updated_at' => '2023-06-30 18:48:09',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Settings',
                'slug' => 'setting',
                'controller' => 'SettingController',
                'icon' => 'fas fa-tools',
                'mainMenu' => NULL,
                'sort' => 7,
                'deleted_at' => NULL,
                'created_at' => '2023-06-30 18:48:09',
                'updated_at' => '2023-07-02 16:05:41',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Master Cars',
                'slug' => 'car',
                'controller' => 'CarController',
                'icon' => '',
                'mainMenu' => 2,
                'sort' => 1,
                'deleted_at' => NULL,
                'created_at' => '2023-06-30 18:48:09',
                'updated_at' => '2023-06-30 18:48:09',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Master Blogs',
                'slug' => 'blog',
                'controller' => 'BlogController',
                'icon' => '',
                'mainMenu' => 3,
                'sort' => 1,
                'deleted_at' => NULL,
                'created_at' => '2023-06-30 18:48:09',
                'updated_at' => '2023-06-30 18:48:09',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Categories',
                'slug' => 'blog/category',
                'controller' => 'BlogCategoryController',
                'icon' => NULL,
                'mainMenu' => 3,
                'sort' => 2,
                'deleted_at' => NULL,
                'created_at' => '2023-06-30 18:48:09',
                'updated_at' => '2023-07-02 04:54:28',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Roles',
                'slug' => 'user/role',
                'controller' => 'RoleController',
                'icon' => NULL,
                'mainMenu' => 4,
                'sort' => 2,
                'deleted_at' => NULL,
                'created_at' => '2023-06-30 18:48:09',
                'updated_at' => '2023-07-02 05:38:29',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Menus',
                'slug' => 'setting/menu',
                'controller' => 'MenuController',
                'icon' => '',
                'mainMenu' => 5,
                'sort' => 1,
                'deleted_at' => NULL,
                'created_at' => '2023-06-30 18:48:09',
                'updated_at' => '2023-06-30 18:48:09',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Permissions',
                'slug' => 'user/permission',
                'controller' => 'PermissionController',
                'icon' => NULL,
                'mainMenu' => 4,
                'sort' => 2,
                'deleted_at' => NULL,
                'created_at' => '2023-06-30 18:48:09',
                'updated_at' => '2023-07-01 08:52:44',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Web Setting',
                'slug' => 'setting',
                'controller' => 'SettingController',
                'icon' => '',
                'mainMenu' => 5,
                'sort' => 2,
                'deleted_at' => NULL,
                'created_at' => '2023-06-30 18:48:09',
                'updated_at' => '2023-06-30 18:48:09',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Master User',
                'slug' => 'user',
                'controller' => 'UserController',
                'icon' => '',
                'mainMenu' => 4,
                'sort' => 1,
                'deleted_at' => NULL,
                'created_at' => '2023-06-30 18:48:09',
                'updated_at' => '2023-06-30 18:48:09',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Location',
                'slug' => 'car/location',
                'controller' => 'LocationController',
                'icon' => '',
                'mainMenu' => 2,
                'sort' => 2,
                'deleted_at' => NULL,
                'created_at' => '2023-06-30 18:48:09',
                'updated_at' => '2023-06-30 18:48:09',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Rent Car',
                'slug' => 'rent',
                'controller' => 'RentCarController',
                'icon' => 'fas fa-calendar',
                'mainMenu' => NULL,
                'sort' => 4,
                'deleted_at' => NULL,
                'created_at' => '2023-06-30 18:49:26',
                'updated_at' => '2023-06-30 18:49:26',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Master Rent Car',
                'slug' => 'rent',
                'controller' => 'RentCarController',
                'icon' => NULL,
                'mainMenu' => 15,
                'sort' => 1,
                'deleted_at' => NULL,
                'created_at' => '2023-06-30 18:49:54',
                'updated_at' => '2023-06-30 19:10:25',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Lisence',
                'slug' => 'car/lisence',
                'controller' => 'CarLisenceController',
                'icon' => NULL,
                'mainMenu' => 2,
                'sort' => 3,
                'deleted_at' => NULL,
                'created_at' => '2023-06-30 18:51:13',
                'updated_at' => '2023-06-30 18:55:28',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Payment',
                'slug' => 'rent/payment',
                'controller' => 'PaymentController',
                'icon' => NULL,
                'mainMenu' => 15,
                'sort' => 2,
                'deleted_at' => NULL,
                'created_at' => '2023-07-01 00:44:47',
                'updated_at' => '2023-07-01 00:46:41',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Service Front End',
                'slug' => 'setting/service',
                'controller' => 'ServiceFrontController',
                'icon' => NULL,
                'mainMenu' => 5,
                'sort' => 3,
                'deleted_at' => NULL,
                'created_at' => '2023-07-01 05:43:11',
                'updated_at' => '2023-07-01 05:44:47',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Booking',
                'slug' => 'booking',
                'controller' => 'BookingController',
                'icon' => 'fas fa-calendar',
                'mainMenu' => NULL,
                'sort' => 5,
                'deleted_at' => NULL,
                'created_at' => '2023-07-01 07:13:36',
                'updated_at' => '2023-07-02 05:46:06',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Master Booking',
                'slug' => 'booking',
                'controller' => 'BookingController',
                'icon' => NULL,
                'mainMenu' => 20,
                'sort' => 1,
                'deleted_at' => NULL,
                'created_at' => '2023-07-01 07:19:53',
                'updated_at' => '2023-07-01 07:20:20',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'User Role',
                'slug' => 'user/role/access',
                'controller' => 'UserRoleController',
                'icon' => NULL,
                'mainMenu' => 4,
                'sort' => 3,
                'deleted_at' => NULL,
                'created_at' => '2023-07-02 01:46:34',
                'updated_at' => '2023-07-02 02:05:51',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'User Permission',
                'slug' => 'user/permission/access',
                'controller' => 'UserPermissionController',
                'icon' => NULL,
                'mainMenu' => 4,
                'sort' => 4,
                'deleted_at' => NULL,
                'created_at' => '2023-07-02 01:49:11',
                'updated_at' => '2023-07-02 03:24:44',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Testimonial',
                'slug' => 'testimonial',
                'controller' => 'TestimonialController',
                'icon' => 'fas fa-smile',
                'mainMenu' => NULL,
                'sort' => 6,
                'deleted_at' => NULL,
                'created_at' => '2023-07-02 16:05:19',
                'updated_at' => '2023-07-02 16:12:50',
            ),
        ));
        
        
    }
}