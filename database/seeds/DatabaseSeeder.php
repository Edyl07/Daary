<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            [
                'role_id'       => 1,
                'name'          => 'Admin',
                'username'      => 'admin',
                'email'         => 'admin@admin.com',
                'phone'         => '37545828',
                'image'         => 'default.png',
                'about'         => 'Bio of admin',
                'password'      => bcrypt('123456'),
                'created_at'    => date("Y-m-d H:i:s")
            ]
        ]);


        DB::table('roles')->    insert([
            [
                'name'          => 'Admin',
                'slug'          => 'admin',
                'created_at'    => date("Y-m-d H:i:s")
            ]
        ]);

    }   
}   
