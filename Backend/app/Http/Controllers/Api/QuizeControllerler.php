<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quize;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\Quize\AddRequest;
use App\Services\QuizeService;
use App\Http\Resources\SuccessResource;
class QuizeControllerler extends Controller
{
    use QuizeService;
   
 /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $quizes = Quize::all();
        return response()->json([
            'success' => true,
            'message' => 'All quizes',
            'data' =>$quizes ,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddRequest $request)
    {
        $data = $request->validated();
        // store a new post
        $this->createQuize($data);
        return new SuccessResource($data);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data =$this->Quize($id);
         return [
            'success' => true,
            'message' => "success",
            'data'    => $data,
        ];

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(AddRequest $request, Quize $quize)
    {
        $data = $request->validated();
        $quize->update($data);
        return new SuccessResource($quize);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quize $quize)
    {
        $quize->delete();
        return new SuccessResource($quize);
    }




}
