<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'prefecture_id',
        'city_code'
    ];

    public function prefecture() {
        return $this->belongsTo(Prefecture::class);
    }

    public function companies() {
        return $this->hasMany(Company::class);
    }

    public function jobs() {
        return $this->hasMany(Company::class);
    }
}
