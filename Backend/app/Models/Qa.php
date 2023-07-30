<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qa extends Model
{
    use HasFactory;
     protected $fillable = [
        'quize_id',
        'quotaion',
        'answer',
        'options',
        'status'
    ];
   public function quize(){
      return $this->belongsTo(Quize::class,'quize_id','id');
   }
}
