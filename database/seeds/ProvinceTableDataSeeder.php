<?php

use App\Model\Province;
use Illuminate\Database\Seeder;

class ProvinceTableDataSeeder extends Seeder
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
               'name'=>'PhnomPenh',
            ],
            [
               'name'=>'BanteayMeanchey',
            ],
        ];
  
        foreach ($user as $key => $value) {
            Province::create($value);
        }
    }
}
