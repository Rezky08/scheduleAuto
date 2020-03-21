<?php

namespace App\Http\Controllers\views;

use App\Http\Controllers\Controller;
use App\Jam;
use App\Helpers\Host;
use App\Helpers\Request_api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\URL;

class JamViewController extends Controller
{
    public function index()
    {
        // untuk ambil data jam dari API
        $host = new Host();
        $url = $host->host('api') . 'jam';
        $reqApi = new Request_api();
        $response = $reqApi->request('GET', $url);

        $data = [];
        $data['jam'] = [];
        if ($response['status'] == 200) {
            $jam = $response['data'];
            $jam = collect($jam);
            $jam = $jam->map(function ($item, $index) {
                $item = collect($item)->toArray();
                return $item;
            });
            $data['jam'] = $jam;
        }

        // call modal name
        $data['modal_name'] = "JAM";
        return view('jam', $data);
    }

    public function add(Request $request)
    {
        $rules = [
            'jam_mulai' => ['required'],
            'jam_selesai' => ['required'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $host = new Host();
        $url = $host->host('api') . 'jam';
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
            'jam_mulai' => ['required'],
            'jam_selesai' => ['required'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        if ($id == $request->id) {
            $form_params = [
                'id' => $id,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
            ];
        } else {
            $form_params = $request->all();
        }

        $host = new Host();
        $url = $host->host('api') . 'jam';
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
        $url = $host->host('api') . 'jam';
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
