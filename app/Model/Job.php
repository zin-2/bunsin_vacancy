<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table ="jobs";
    protected $fillable = [
    'category_id',
    'company_id',
    'user_id',
    'province_id',
    'district_id',
    'job_type',
    'title',
    'closing_date',
    'exp_level',
    'description',
    'requirement',
    'start_from',
    'start_to',
    'level',
    'is_negotiation',
    'is_active',
    'created_at',
    'updated_at',
    'min_salary',
    'max_salary',
    'vacancy',
    'salary_cycle',
    'experience_required_years'
    ];

    public function Company(){
        return $this->belongsTo(Company::class);
    }
    public function Province(){
        return $this->belongsTo(Province::class);
    }
    public function District(){
        return $this->belongsTo(District::class);
    }
    public function Category(){
        return $this->belongsTo(Category::class);
    }
    public function User(){
        return $this->belongsToMany(User::class, 'user_job');
        // return $this->belongsTo(User::class);
    }
}
