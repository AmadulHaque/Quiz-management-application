<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quize;
use Illuminate\Support\Facades\Validator;

class QuizeControllerler extends Controller
{
   
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:280|unique:quizes',
            'description' => 'required|string',
            'mark' => 'required',
            'status' => 'required',
        ]);

        // return form validation error with json if error occured
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error occured',
                'errors' => $validator->getMessageBag(),
            ], 422);
        }
        $data = $validator->validated();
       
        // store a new post
        Quize::create($data);
        return response()->json([
            'success' => true,
            'message' => 'Task created successfully!',
            'data' => [],
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Quize $quize)
    {
        return response()->json([
            'success' => true,
            'message' => 'quize details.',
            'data' => $quize,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quize $quize)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:280|unique:quizes,title,' . $quize->id,
            'description' => 'required|string',
            'status' => 'required',
        ]);

        // return form validation error with json if error occured
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error occured',
                'errors' => $validator->getMessageBag(),
            ], 422);
        }

        $data = $validator->validated();
        $quize->update($data);
        return response()->json([
            'success' => true,
            'message' => 'quize updated successfully!',
            'data' => [],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quize $quize)
    {
        $quize->delete();
        return response()->json([
            'success' => true,
            'message' => 'quize deleted successfully!',
            'data' => [],
        ]);
    }




}
