<?php

use App\Model\District;
use Illuminate\Database\Seeder;

class DistrictTableDataSeeder extends Seeder
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
               'name'=>'MeanChey',
               'province_id' => 1
            ],
            [
               'name'=>'PhnomSrok',
               'province_id' => 2
            ],
        ];
  
        foreach ($user as $key => $value) {
            District::create($value);
        }
    }
}
