<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table ="district";
    protected $fillable = ['name','status','provine_id'];

    public function Province(){
        return $this->belongsTo(Province::class);
    }
    public function Job(){
        return $this->hasMany(Job::class);
    }
    
}
