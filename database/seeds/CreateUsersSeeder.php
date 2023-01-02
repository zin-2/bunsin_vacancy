<?php

use App\User;

use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Administrator',
               'email'=>'admin@gmail.com',
               'is_admin'=>'1',
               'is_active'=>'0',
               'password'=> bcrypt('password'),
            ],
            [
               'name'=>'User',
               'email'=>'user@gmail.com',
               'is_admin'=>'0',
               'is_active'=>'0',
               'password'=> bcrypt('password'),
            ],
            [
                'name'=>'Toeng Seyha',
                'email'=>'toeng.seyha@gmail.com',
                'is_admin'=>'2',
                'is_active'=>'0',
                'password'=> bcrypt('password'),
             ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
