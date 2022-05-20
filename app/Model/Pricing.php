<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    //
    protected $table ="pricings";
    protected $fillable = ['package_name','price','preminum_job','status'];

    public function users(){
        return $this->belongsToMany(User::class, 'user_pricing');
        // return $this->belongsTo(User::class);
    }
}
