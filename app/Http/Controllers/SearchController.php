<?php

namespace App\Http\Controllers;

use App\Models\Kidung;
use App\Models\Suplemen;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNumeric;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if (is_numeric($request->search)) {
            $data_kidung = Kidung::where('no_kidung', 'like', $request->search . '%')->get();
            $data_suplemen = Suplemen::where('no_kidung', 'like', $request->search . '%')->get();
        } else {
            $data_kidung = Kidung::where('judul', 'like', '%' . $request->search . '%')->orWhere('isi', 'like', '%' . $request->search . '%')->get();
            $data_suplemen = Suplemen::where('judul', 'like', '%' . $request->search . '%')->get();
        }


        foreach ($data_kidung as $single_data) {
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

        return view('search', compact('data_kidung', 'data_suplemen'));
    }
}
