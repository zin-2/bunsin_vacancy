<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserJob extends Model
{
    //
    protected $table ="user_job";
    protected $fillable = ['user_id','job_id','applies_date','resume','status'];
    
    public $timestamps = false;
    public function job(){
        return $this->belongsTo(Job::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
