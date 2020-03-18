<?php

namespace App\Http\Controllers\views;

use App\Http\Controllers\Controller;
use App\Jam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\URL;

class JamViewController extends Controller
{
    public function index()
    {
        $jam = Jam::all();
        $data = [
            'jam' => $jam->toArray()
        ];
        return view('jam', $data);
    }

    public function tambah(Request $request)
    {
        dd('test');
        $rules = [
            'jam_mulai' => ['required', 'date_format:H:i:s'],
            'jam_selesai' => ['required', 'date_format:H:i:s'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $url = URL::to('api/jam');
        $client = new Client();
        $client = $client->post($url, ['form_params' => $request->all()]);
        if ($client->getStatusCode() == 200) {
            dd("Berhasil");
        }
        dd("gagal");
    }
}
