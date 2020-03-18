<?php

namespace App\Http\Controllers\views;

use App\Helpers\Host;
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
        $client = new Client();
        try {
            $client = $client->post($url, ['form_params' => $request->all()]);
            if ($client->getStatusCode() == 200) {
                $contents = $client->getBody()->getContents();
                $contents = json_decode($contents);
                $contents = collect($contents->message);
                $success = $contents->map(function ($item, $index) {
                    return $item;
                });
                $success = $success->toArray();
                $message = [
                    'success' => $success
                ];
                return redirect()->back()->with($message);
            }
        } catch (GuzzleException $e) {
            $contents = $e->getResponse()->getBody()->getContents();
            $contents = json_decode($contents);
            $contents = collect($contents->message);
            $message = $contents->toArray();
            return redirect()->back()->withErrors($message)->withInput();
        }
    }
}
