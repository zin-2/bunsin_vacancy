<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table ="province";
    protected $fillable = ['name','status'];

    public function Districts(){
        return $this->hasMany(District::class);
    }
    public function Job(){
        return $this->hasMany(Job::class);
    }
}
