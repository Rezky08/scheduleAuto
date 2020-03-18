<?php

namespace App\Http\Controllers\views;

use App\Helpers\Host;
use App\Helpers\Request_api;
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
        // untuk ambil data mata kuliah dari API
        $host = new Host();
        $url = $host->host('api') . 'matkul';
        $reqApi = new Request_api();
        $response = $reqApi->request('GET', $url);

        $data = [];
        $data['mata_kuliah'] = [];
        if ($response['status'] == 200) {
            $matakuliah = $response['data'];
            $data['mata_kuliah'] = $matakuliah;
        }

        return view('matkul', $data);
    }

    public function tambah(Request $request)
    {
        $rules = [
            'kode_matkul' => ['required', 'max:10'],
            'sks_matkul' => ['required', 'numeric'],
            'nama_matkul' => ['required'],
            'status_matkul' => ['boolean'],
            'kode_prodi' => ['required'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $host = new Host();
        $url = $host->host('api') . 'matkul';
        $reqApi = new Request_api();
        $response = $reqApi->request('POST', $url, ['form_params' => $request->all()]);
        if ($response['status'] == 200) {
            $success = [
                'success' => $response['message']
            ];
            return redirect()->back()->with($success);
        }

        $errors = $response['message'];
        return redirect()->back()->withErrors($errors)->withInput();
    }
}
