<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Mode\Company;
use App\model\Pricing;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_admin',
        'job_roles',
        'professional',
        'experience',
        'birth_date',
        'photo',
        'gender',
        'website',
        'skills',
        'languages',
        'bio',
        'education',
        'marital_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }    

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function Company(){
        return $this->hasMany(Company::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_job');
    }
    public function pricings(){
        return $this->belongsToMany(Pricing::class, 'user_pricing');
        // return $this->belongsTo(User::class);
    }
     /**
     * Set the categories
     *
     */
    public function setCatAttribute($value)
    {
        $this->attributes['skills'] = json_encode($value);
        $this->attributes['languages'] = json_encode($value);
    }
  
    /**
     * Get the categories
     *
     */
    public function getCatAttribute($value)
    {
        return $this->attributes['skills'] = json_decode($value);
        return $this->attributes['languages'] = json_encode($value);
    }
}
