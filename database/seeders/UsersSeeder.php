<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'usertype' => '0',
            'phone' => '9665' . random_int(10000000, 99999999),
            'email_verified_at' => Carbon::now(),
            'address' => 'user@gmail.com',
            'password' => bcrypt('123123123'),
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'usertype' => '1',
            'phone' => '9665' . random_int(10000000, 99999999),
            'email_verified_at' => Carbon::now(),
            'address' => 'Dammascoss',
            'password' => bcrypt('123123123'),
        ]);
        User::create([
            'name' => 'Ghassan',
            'email' => 'ghassanzak16412@gmail.com',
            'usertype' => '1',
            'phone' => '9665' . random_int(10000000, 99999999),
            'email_verified_at' => Carbon::now(),
            'address' => 'Dammascoss',
            'password' => bcrypt('123123123'),
        ]);
    }
}
