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
            $matakuliah = collect($matakuliah);
            $matakuliah = $matakuliah->map(function ($item, $index) {
                $item = collect($item)->toArray();
                return $item;
            });
            $data['mata_kuliah'] = $matakuliah;
        }

        return view('matkul', $data);
    }

    public function add(Request $request)
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
        $message = collect($response['message']);
        if ($response['status'] == 200) {
            $success = [
                'success' => $message->toArray()
            ];
            return redirect()->back()->with($success);
        }

        $errors = $message->toArray();
        return redirect()->back()->withErrors($errors)->withInput();
    }

    public function update(Request $request, $kode_matkul)
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
        if ($kode_matkul != $request->kode_matkul) {
            $form_params = [
                'kode_matkul' => $kode_matkul,
                'kode_matkul_new' => $request->kode_matkul,
                'nama_matkul' => $request->nama_matkul,
                'sks_matkul' => $request->sks_matkul,
                'status_matkul' => $request->status_matkul,
                'kode_prodi' => $request->kode_prodi
            ];
        } else {
            $form_params = $request->all();
        }

        $host = new Host();
        $url = $host->host('api') . 'matkul';
        $reqApi = new Request_api();
        $response = $reqApi->request('PUT', $url, ['form_params' => $form_params]);
        $message = collect($response['message']);
        if ($response['status'] == 200) {
            $success = [
                'success' => $message->toArray()
            ];
            return redirect()->back()->with($success);
        }

        $errors = $message->toArray();
        return redirect()->back()->withErrors($errors)->withInput();
    }

    public function delete($kode_matkul)
    {
        $rules = [
            'kode_matkul' => ['required', 'max:10']
        ];
        $form_params = [
            'kode_matkul' => $kode_matkul
        ];
        $validator = Validator::make($form_params, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $host = new Host();
        $url = $host->host('api') . 'matkul';
        $reqApi = new Request_api();
        $response = $reqApi->request('DELETE', $url, ['form_params' => $form_params]);
        $message = collect($response['message']);
        if ($response['status'] == 200) {
            $success = [
                'success' => $message->toArray()
            ];
            return redirect()->back()->with($success);
        }

        $errors = $message->toArray();
        return redirect()->back()->withErrors($errors)->withInput();
    }
}
