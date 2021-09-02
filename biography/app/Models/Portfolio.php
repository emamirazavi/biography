<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $guarded = ['_token'];
    // public $incrementing = true;
    public function bio()
    {
        return $this->hasOne(Bio::class);
    }
}
