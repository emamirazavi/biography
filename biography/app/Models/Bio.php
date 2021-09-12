<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    protected $table = 'bio';
    /*
    0|id|integer|1||1
    1|name|varchar|1||0         required
    2|job_title|varchar|1||0    required
    3|avatar|varchar|1||0       
    4|location|text|1||0
    5|about|text|1||0
    6|email_subject|varchar|1||0
    7|email_address|varchar|1||0
    8|smtp_user|varchar|1||0
    9|smtp_pass|varchar|1||0
    10|domain|varchar|1||0
    11|user_id|integer|1||0
     */

    use HasFactory;

    protected $guarded = ['_token'];
    
    // public $incrementing = true;
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function portfolio()
    {
        return $this->hasMany(Portfolio::class);
    }

    public function skill()
    {
        return $this->hasMany(Skill::class);
    }

    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        static::deleting(function($bio) { // before delete() method call this
            foreach ($bio->portfolio as $port) {
                $port->delete();
            }
            $bio->skill()->delete();
        });
    }
}
