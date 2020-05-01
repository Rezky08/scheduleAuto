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
        // get data mata kuliah
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
        // get data prodi
        $url = $host->host('api') . 'program_studi';
        $response = $reqApi->request('GET', $url);
        $data['program_studi'] = [];
        if ($response['status'] == 200) {
            $program_studi = $response['data'];
            $program_studi = collect($program_studi);
            $program_studi = $program_studi->map(function ($item, $index) {
                $item = collect($item)->toArray();
                return $item;
            });
            $data['program_studi'] = $program_studi;
        }


        // call modal name
        $data['modal_name'] = "MATKUL";
        return view('matkul', $data);
    }

    public function add(Request $request)
    {
        $rules = [
            'kode_matkul' => ['required', 'max:10'],
            'sks_matkul' => ['required', 'numeric'],
            'nama_matkul' => ['required'],
            'status_matkul' => ['boolean'],
            'lab_matkul' => ['boolean'],
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

    public function update(Request $request, $id)
    {
        $rules = [
            'kode_matkul' => ['required', 'max:10'],
            'sks_matkul' => ['required', 'numeric'],
            'nama_matkul' => ['required'],
            'status_matkul' => ['boolean'],
            'lab_matkul' => ['boolean'],
            'kode_prodi' => ['required'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $form_params = $request->all();
        $form_params['id'] = $id;

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

    public function delete($id)
    {
        $rules = [
            'id' => ['required']
        ];
        $form_params = [
            'id' => $id
        ];
        $validator = Validator::make($form_params, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $host = new Host();
        $url = $host->host('api') . 'matkul';
        $reqApi = new Request_api();
        $response = $reqApi->request('DELETE', $url, ['form_params' => $form_params]);

        if ($response['status'] == 200) {
            $message = collect($response['message']);
            $success = [
                'success' => $message->toArray()
            ];
            return redirect()->back()->with($success);
        }
        $message = collect($response['message']);
        $errors = $message->toArray();
        return redirect()->back()->withErrors($errors)->withInput();
    }
}
