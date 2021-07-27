<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public $fillable = ['name'];
    public function subServices(){
    return $this->hasMany('App\Models\SubService');
    }


    // public  static function boot() {
    //     parent::boot();

    //     static::deleting(function($service) {
    //         //remove related rows region and city

    //         // need an alternative variation of this code
          
    //         $service->manicureServices()->delete();

    //         return true;
    //     });
    // }
}

