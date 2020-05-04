<?php

namespace App\Http\Controllers\views;

use App\Http\Controllers\Controller;
use App\sesi;
use App\Helpers\Host;
use App\Helpers\Request_api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\URL;

class SesiViewController extends Controller
{
    public function index()
    {
        // untuk ambil data Sesi dari API
        $host = new Host();
        $url = $host->host('api') . 'sesi';
        $reqApi = new Request_api();
        $response = $reqApi->request('GET', $url);

        $data = [];
        // get data prodi
        $url = $host->host('api') . 'sesi';
        $response = $reqApi->request('GET', $url);
        $data['sesi'] = [];
        if ($response['status'] == 200) {
            $sesi = $response['data'];
            $sesi = collect($sesi);
            $sesi = $sesi->map(function ($item, $index) {
                $item = collect($item)->toArray();
                return $item;
            });
            $data['sesi'] = $sesi;
        }

        // call modal name
        return view('sesi', $data);
    }

    public function add(Request $request)
    {
        $rules = [
            'sesi_mulai' => ['required'],
            'sesi_selesai' => ['required'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $host = new Host();
        $url = $host->host('api') . 'sesi';
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
            'sesi_mulai' => ['required'],
            'sesi_selesai' => ['required'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $form_params = $request->all();
        $form_params['id'] = $id;

        $host = new Host();
        $url = $host->host('api') . 'sesi';
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
        $url = $host->host('api') . 'sesi';
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
