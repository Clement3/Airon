<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'admin' => 1,
            'created_at' => Date::now(),
        ]);
        
        DB::table('profiles')->insert([
            'user_id' => 1,
        ]);       
    }
}
