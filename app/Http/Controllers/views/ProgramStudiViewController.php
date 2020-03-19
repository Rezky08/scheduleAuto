<?php

namespace App\Http\Controllers\views;

use App\Http\Controllers\Controller;
use App\ProgramStudi;
use App\Helpers\Host;
use App\Helpers\Request_api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\URL;

class ProgramStudiViewController extends Controller
{
    public function index()
    {
        // untuk ambil data mata kuliah dari API
        $host = new Host();
        $url = $host->host('api') . 'program_studi';
        $reqApi = new Request_api();
        $response = $reqApi->request('GET', $url);

        $data = [];
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
        $data['modal_name'] = "PRODI";
        return view('program_studi', $data);
    }

    public function add(Request $request)
    {
        $rules = [
            'kode_prodi' => ['required'],
            'nama_prodi' => ['required'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $host = new Host();
        $url = $host->host('api') . 'program_studi';
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

    public function update(Request $request, $kode_prodi)
    {
        $rules = [
            'kode_prodi' => ['required'],
            'nama_prodi' => ['required'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        if ($kode_prodi != $request->kode_prodi) {
            $form_params = [
                'kode_prodi' => $kode_prodi,
                'kode_prodi_new' => $request->kode_prodi,
                'nama_prodi' => $request->nama_prodi,
            ];
        } else {
            $form_params = $request->all();
        }

        $host = new Host();
        $url = $host->host('api') . 'program_studi';
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


    public function delete($kode_prodi)
    {
        $rules = [
            'kode_prodi' => ['required']
        ];
        $form_params = [
            'kode_prodi' => $kode_prodi
        ];
        $validator = Validator::make($form_params, $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $host = new Host();
        $url = $host->host('api') . 'program_studi';
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
