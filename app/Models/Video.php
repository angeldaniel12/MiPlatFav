<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    // protected $table='rels';
    protected $fillable =['path','descripcion','user_id'];
    use HasFactory;

     public function user()
     {
         return $this->belongsTo(User::class);
     }

     public function owner()
     {
         return $this->belongsTo(User::class,'user_id');
     }

}
