<?php
namespace App\Services;

use App\Models\Qa;
use Illuminate\Database\Eloquent\Model;


trait QaService
{
    /**
     * Create new user
     * @param array $data
     * 
     * @return App\Models\User $user
     */
    public function createQa( $data)
    {
        $data = Qa::create($data);
        return $data;
    }
    public function Qas()
    {
        $data = Qa::latest()->get();
        return $data;
    }
    public function Qa($id)
    {
        $data = Qa::findOrFail($id);
        return $data;
    }
}