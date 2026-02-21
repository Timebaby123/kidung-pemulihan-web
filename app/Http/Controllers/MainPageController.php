<?php

namespace App\Http\Controllers;

use App\Models\Kidung;
use App\Models\Suplemen;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function get(Request $request)
    {
        if (isset($request->suplemen)) {
            $check_exist = Suplemen::where('no_kidung', $request->search)->count();
            if ($check_exist == 1) {
                return redirect()->route('SuplemenPage', $request->search);
            }
            $data_suplemen = Suplemen::where('judul', 'like', '%' . $request->search . '%')->orWhere('isi', 'like', '%' . $request->search . '%')->get();
            foreach ($data_suplemen as $single_data) {
                $isi = explode("\n", $single_data->isi);
                $single_data->isi = NULL;
                foreach ($isi as $baris) {
                    if (str_contains(strtolower($baris), strtolower($request->search))) {

                        $single_data->isi = $baris;

                        $single_data->isi = str_replace(strtolower($request->search), '<span class"bg-yellow-300">' . $request->search . "</span>", strtolower($single_data->isi));


                        break;
                    }
                }
            }
            $data_kidung = [];
            return view('search', compact('data_kidung', 'data_suplemen'));
        }

        if (isset($request->kidung)) {
            $check_exist = Kidung::where('no_kidung', $request->search)->count();

            if ($check_exist == 1) {
                return redirect()->route('KidungPage', $request->search);
            }
            $data_kidung = Kidung::where('judul', 'like', '%' . $request->search . '%')->orWhere('isi', 'like', '%' . $request->search . '%')->get();
           foreach ($data_kidung as $single_data) {
            $isi = explode("\n", $single_data->isi);
            $single_data->isi = NULL;
            foreach ($isi as $baris) {
                if (str_contains(strtolower($baris), strtolower($request->search))) {

                    $single_data->isi = $baris;

                    $single_data->isi = str_replace(strtolower($request->search), '<span class"bg-yellow-300">'. $request->search . "</span>", strtolower($single_data->isi));

                    
                    break;
                }
            }
        
                $data_suplemen = [];
                return view('search', compact('data_kidung', 'data_suplemen'));
            }
        }
    }
}
