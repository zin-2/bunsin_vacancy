<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserBookmark extends Model
{
    //
    protected $table ="job_save";
    protected $fillable = ['user_id','job_id','status'];


    public $timestamps = false;

}
