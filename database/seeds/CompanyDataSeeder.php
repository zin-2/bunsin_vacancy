<?php

use App\Model\Company;
use Illuminate\Database\Seeder;

class CompanyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company =[
              [
                    'user_id' => 1,
                    'company_name'=>'Global Liquidity Exchange Co.,Ltd',
                    'industry' => 'Accounting/Taxation/Auditing',
                    'description'=> 'Best Company',
                    'company_logo'=> '',
                    'title'=> 'Mrs.',
                    'first_name'=>'Bunsin',
                    'last_name'=>'Toeng',
                    'primary_email'=>'bunsin.toeng@gmail.com',
                    'primary_phone'=>'+(855) 962711117',
                    'website'=>'',
                    'facebook_link'=>'',
                    'linkin_link'=>'',
                    'primary_address'=>'',
                    'lat'=>'11.5564',
                    'long'=>'104.9282',
                    'status'=>'active',
              ]
            ];

        foreach ($company as $key => $value) {
            # code...
            Company::create($value);
        }
    }
}
