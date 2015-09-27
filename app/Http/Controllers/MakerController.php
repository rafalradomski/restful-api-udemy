<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Maker; // Load Maker model
use App\Vehicle; // Load Vehicle model

use App\Http\Requests\CreateMakerRequest; // CreateMakerRequest

class MakerController extends Controller {

    // Authentication
    public function __construct() {

        $this->middleware('auth.basis.once', ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    {

        $maker = Maker::all();
        if(!$maker) { 
            return response()->json([
                'message' => 'No makers',  
                'code' => 404
                ],404);
        }
        return response()->json(['data' => $maker], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMakerRequest $request)    {
        
        $values = $request->only(['name','phone']);

        Maker::create($values);

        return response()->json([
            'message' => 'Maker correctly added'
            ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)    {

        $maker = Maker::find($id);

        if(!$maker) { 
            return response()->json([
                'message' => 'This maker does not exist',  
                'code' => 404
                ],404);
        }
        return response()->json([
            'data' => $maker
            ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateMakerRequest $request, $id)    {

        $maker = Maker::find($id);

        if(!$maker) { 
            return response()->json([
                'message' => 'This maker does not exist',  
                'code' => 404
                ],404);
        }

        $name = $request->get('name');
        $phone = $request->get('phone');

        $maker->name = $name;
        $maker->phone = $phone;

        $maker->save();

        return response()->json([
            'message' => 'The maker has been updated'
            ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)    {

        $maker = Maker::find($id);

        if(!$maker) { 
            return response()->json([
                'message' => 'This maker does not exist',  
                'code' => 404
                ],404);
        }

        $vehicles = $maker->vehicles;

        if(sizeof($vehicles) > 0) {
            return response()->json([
                'message' => 'This maker have associated vehicles. Delete his vehicles first',  
                'code' => 404
            ],404);
        }

        $maker->delete();

        return response()->json([
            'message' => 'The maker has been deleted.'
            ], 200);

    }
}
