<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function cities() {
        return $this->hasMany(City::class);
    }

    public function companies() {
        return $this->hasMany(Company::class);
    }

    public function jobs() {
        return $this->hasMany(Company::class);
    }
}
