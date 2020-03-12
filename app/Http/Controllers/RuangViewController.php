<?php

namespace App\Http\Controllers;

use App\Ruang;
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
        dd('test');
        $rules = [
            'ruang_mulai' => ['required', 'date_format:H:i:s'],
            'ruang_selesai' => ['required', 'date_format:H:i:s'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $url = URL::to('api/ruang');
        $client = new Client();
        $client = $client->post($url, ['form_params' => $request->all()]);
        if ($client->getStatusCode() == 200) {
            dd("Berhasil");
        }
        dd("gagal");
    }
}
