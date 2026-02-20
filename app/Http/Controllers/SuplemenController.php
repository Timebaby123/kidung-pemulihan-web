<?php

namespace App\Http\Controllers;

use App\Models\Suplemen;
use Illuminate\Http\Request;

class SuplemenController extends Controller
{
    public function index(int $no_kidung)
    {
        $data = Suplemen::where("no_kidung", $no_kidung)->first();
        $method = 0;
        return view('kidung', compact('data','method'));
    }
}
