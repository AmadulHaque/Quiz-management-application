<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quize;
use App\Models\Qa;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\Qa\AddRequest;
use App\Services\QuizeService;
use App\Services\QaService;
use App\Http\Resources\SuccessResource; 

class QaController extends Controller
{
    use QaService,QuizeService;
   
 /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $quizes = Qa::all();
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
        $res = $this->createQa($data);
        return new SuccessResource($res);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data =$this->Qa($id);
         return [
            'success' => true,
            'message' => "success",
            'data'    => $data,
        ];

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(AddRequest $request, Qa $quize)
    {
        $data = $request->validated();
        $quize->update($data);
        return new SuccessResource($quize);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Qa $id)
    {
        Qa::where('id',$id)->delete();
        return new SuccessResource($id);
    }

}
