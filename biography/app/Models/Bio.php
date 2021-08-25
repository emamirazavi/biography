<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    use HasFactory;

    // public $incrementing = true;
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
