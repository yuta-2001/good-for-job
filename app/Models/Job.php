<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'message',
        'company_id',
        'occupation_id',
        'employment_type_id',
        'img',
        'prefecture_id',
        'city_id',
        'access',
        'payment',
        'content',
        'status',
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function features() {
        return $this->belongsToMany(Feature::class);
    }

    public function occupation() {
        return $this->belongsTo(Occupation::class);
    }

    public function prefecture() {
        return $this->belongsTo(Prefecture::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }
    
}
