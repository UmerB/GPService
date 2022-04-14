<?php

namespace Database\Seeders;

use \App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            'name'=>'GP Umer Bashir',
            'email'=>'umer_b@outlook.com',
            'is_admin'=>'1',
            'password'=> bcrypt('adminPassword'),
            'condition'=> 'None',
        ];

        $adminUser = [
            'name'=>'Sami Bashir',
            'email'=>'sami@outlook.com',
            'is_admin'=>'1',
            'password'=> bcrypt('sami1234'),
            'condition'=> 'None',
        ];
        

        User::create($user);
        User::create($adminUser);

        \App\Models\User::factory(10)->create();
    }
}
