<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BaseUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Base User',
            'email' => 'user@barbatos.com',
            'password' => bcrypt('user'),
            'gender' => 'Male',
            'dob' => date('Y-m-d', time()),
            'country' => 'Indonesia',
            'privilege' => 'User'
        ]);

        User::create([
            'name' => 'Base Admin',
            'email' => 'admin@barbatos.com',
            'password' => bcrypt('admin'),
            'gender' => 'Male',
            'dob' => date('Y-m-d', time()),
            'country' => 'Indonesia',
            'privilege' => 'Admin'
        ]);
    }
}
