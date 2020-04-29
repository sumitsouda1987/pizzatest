<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'firstname' => 'Super',
            'midname' => 'S',
            'lastname' => 'Admin',
            'email' => 'super@email.com',
            'password' => Hash::make('Super@123'),
        ]);
    }
}
