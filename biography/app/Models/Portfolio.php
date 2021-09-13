<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helper\FileSaver;

class Portfolio extends Model
{
    use HasFactory;
    protected $guarded = ['_token'];
    // public $incrementing = true;
    public function bio()
    {
        return $this->hasOne(Bio::class, 'id', 'bio_id');
    }

    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        static::deleting(function($portfolio) { // before delete() method call this
            FileSaver::deleteFile($portfolio->img);
        });
    }
}
