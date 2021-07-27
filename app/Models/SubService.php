<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    use HasFactory;
    public $fillable = ['name','price','service_id'];
    public function service(){
    return $this->belongsTo('App\Models\Service');
    }
}
