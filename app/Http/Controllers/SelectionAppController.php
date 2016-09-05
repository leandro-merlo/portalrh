<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SelectionAppController extends Controller
{
    function select(Request $request){
        $route = $request->input('route');
        return redirect($route);
    }
}
