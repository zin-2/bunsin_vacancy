<?php

use App\Model\Category;
use Illuminate\Database\Seeder;

class CategoryTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = 
            [[
               'name'=>'Information Technology',
            ]];
        foreach($user as $users){
            Category::create($users);
        }
    }
}
