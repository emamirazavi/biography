<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $guarded = ['_token'];
    public function bio()
    {
        return $this->hasOne(Bio::class, 'id', 'bio_id');
    }
}
