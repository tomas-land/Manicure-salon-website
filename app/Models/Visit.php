<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    public $fillable = ['start','end','price','name','service','client_id','created_by'];

    public function client(){
        return $this->belongsTo('App\Models\Client');
        }
}
