<?php

namespace App\Http\Controllers;
use App\Models\incident ;
use Illuminate\Http\Request;

class incidentController extends Controller
{
    //
    public function create(Request $request){
        $incident = incident::create($request->all());
        $incident->save();
        return response()->json($incident);
     }
}
