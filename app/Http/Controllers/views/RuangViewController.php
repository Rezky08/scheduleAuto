<?php

namespace App\Http\Controllers\views;


use App\Http\Controllers\Controller;
use App\Ruang;
use App\Helpers\Host;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\URL;

class ruangViewController extends Controller
{
    public function index()
    {
        $ruang = Ruang::all();
        $data = [
            'ruang' => $ruang->toArray()
        ];
        return view('ruang', $data);
    }

    public function tambah(Request $request)
    {
        $rules = [
            'nama_ruang' => ['required'],
            'keterangan' => ['required'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }


        $host = new Host();
        $url = $host->host('api') . 'ruang';
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
