<?php

namespace App\Http\Controllers\views;

use App\Http\Controllers\Controller;
use App\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\URL;

class MatkulViewController extends Controller
{
    public function index()
    {
        $matakuliah = Matakuliah::all();
        $data = [
            'matakuliah' => $matakuliah->toArray()
        ];
        return view('matkul', $data);
    }

    public function tambah(Request $request)
    {
        dd('test');
        $rules = [
            'kode_matkul' => ['required', 'unique:mata_kuliah,kode_matkul', 'max:10'],
            'sks_matkul' => ['required', 'numeric'],
            'nama_matkul' => ['required'],
            'status_matkul' => ['boolean'],
            'kode_prodi' => ['required', 'exists:program_studi,kode_prodi'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $url = URL::to('api/matakuliah');
        $client = new Client();
        $client = $client->post($url, ['form_params' => $request->all()]);
        if ($client->getStatusCode() == 200) {
            dd("Berhasil");
        }
        dd("gagal");
    }
}
