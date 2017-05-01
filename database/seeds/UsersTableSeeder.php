<?php

use Illuminate\Database\Seeder;
use App\Helpers\UniqueIdentifier;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = UniqueIdentifier::generate('users');

        DB::table('users')->insert([
            'id' => $id,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'admin' => 1,
            'created_at' => Date::now(),
        ]);
        
        DB::table('profiles')->insert([
            'user_id' => $id,
        ]);       
    }
}
