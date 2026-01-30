<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(int $method, $isi)
    {
    
        if($method == 1)
        {
            if(is_numeric($isi))
            {
                
            }
            else
            {

            }
        }
        if($method == 2)
        {

        }
    }
}
