<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quize extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'mark',
        'status'
    ];
    public static function getByStatus($id)
    {
        $data = self::where('id',$id)->where('status',1)->latest('id')->first();
        return $data;
    }
}
