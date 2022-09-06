<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Company extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'industory_id',
        'prefecture_id',
        'city_id',
        'address',
        'president',
        'count_of_employee',
        'img',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function industory() {
        return $this->belongsTo(Industory::class);
    }

    public function prefecture() {
        return $this->belongsTo(Prefecture::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function jobs() {
        return $this->hasMany(Job::class);
    }
}
