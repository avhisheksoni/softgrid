<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        User::create(['name' => 'Parnter A','email' => 'parnter_a@mail.com', 'password' => Hash::make('12345678')]);
        User::create(['name' => 'Parnter B','email' => 'partner_b@mail.com', 'password' => Hash::make('12345678')]);
        User::create(['name' => 'Parnter C','email' => 'partner_c@mail.com', 'password' => Hash::make('12345678')]);
        User::create(['name' => 'Parnter D','email' => 'partner_d@mail.com', 'password' => Hash::make('12345678')]);
    }
}
