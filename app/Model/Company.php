<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $table ="company";
    protected $fillable = ['user_id',
    'company_name','industry','description','company_logo','status',
    'title',
    'first_name',
    'last_name',
    'primary_email',
    'primary_phone',
    'website',
    'facebook_link',
    'linkIn_link',
    'primary_address',
];


    public function Job(){
        return $this->hasMany(Job::class);
    }
}
