<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'entry_id',
        'send_by',
    ];

    public function entry() {
        return $this->belongsTo(Entry::class);
    }
}
