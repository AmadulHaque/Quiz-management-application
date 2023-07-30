<?php
namespace App\Services;

use App\Models\Quize;
use Illuminate\Database\Eloquent\Model;


trait QuizeService
{
    /**
     * Create new user
     * @param array $data
     * 
     * @return App\Models\User $user
     */
    public function createQuize( $data)
    {
        $data = Quize::create($data);
        return $data;
    }
    public function Quizes()
    {
        $data = Quize::latest()->get();
        return $data;
    }
    public function Quize($id)
    {
        $data = Quize::findOrFail($id);
        return $data;
    }
}