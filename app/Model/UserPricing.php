<?php

namespace App\Model;

use App\model\Pricing;
use App\User;
use Illuminate\Database\Eloquent\Model;

class UserPricing extends Model
{
    //
    protected $table ="user_pricing";
    protected $fillable = ['package_name','price','preminum_job','status'];
    
    public $timestamps = false;
    public function pricing(){
        return $this->belongsTo(Pricing::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
