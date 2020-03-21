<?php

namespace App\Http\Controllers\views;

use App\Http\Controllers\Controller;
use App\Hari;
use App\Helpers\Host;
use App\Helpers\Request_api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\URL;

class HariViewController extends Controller
{
    public function index()
    {
        // untuk ambil data mata kuliah dari API
        $host = new Host();
        $url = $host->host('api') . 'hari';
        $reqApi = new Request_api();
        $response = $reqApi->request('GET', $url);

        $data = [];
        $data['mata_kuliah'] = [];
        if ($response['status'] == 200) {
            $hari = $response['data'];
            $hari = collect($hari);
            $hari = $hari->map(function ($item, $index) {
                $item = collect($item)->toArray();
                return $item;
            });
            $data['hari'] = $hari;
        }

        // call modal name
        $data['modal_name'] = "HARI";
        return view('hari', $data);
    }

    public function add(Request $request)
    {
        $rules = [
            'nama_hari' => ['required'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $host = new Host();
        $url = $host->host('api') . 'hari';
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
            'nama_hari' => ['required'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        if ($id == $request->id) {
            $form_params = [
                'id' => $id,
                'nama_hari' => $request->nama_hari,
            ];
        } else {
            $form_params = $request->all();
        }

        $host = new Host();
        $url = $host->host('api') . 'hari';
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
        $url = $host->host('api') . 'hari';
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
