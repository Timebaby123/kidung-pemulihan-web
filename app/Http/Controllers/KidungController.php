<?php

namespace App\Http\Controllers;

use App\Models\Kidung;
use Illuminate\Http\Request;

class KidungController extends Controller
{
    public function index(int $no_kidung)
    {
        $data = Kidung::where("no_kidung", $no_kidung)->first();
        return view('kidung', compact('data'));
    }
}
