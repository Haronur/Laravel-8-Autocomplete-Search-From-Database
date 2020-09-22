<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AutocompleteSearchDBController extends Controller
{
    public function index()
    {
        return view('autocomplete-textbox-search');
    }
 
    public function searchDB(Request $request)
    {
          $search = $request->get('term');
      
          $result = User::where('name', 'LIKE', '%'. $search. '%')->get();
 
          return response()->json($result);
            
    } 
}