<?php

namespace App\Http\Controllers;

use App\Models\Kidung;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNumeric;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if(isNumeric($request->search))
        {
            $data = Kidung::where('no_kidung','like', $request->search . '%')->get();
            
        }
        else $data = Kidung::where('judul','like', '%'. $request->search . '%')->orWhere('isi','like', '%'. $request->search . '%')->get();
        return view('search',compact('data')); 
        
    }
}
