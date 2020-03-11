<?php

namespace App\Http\Controllers;

use App\Hari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\URL;

class HariViewController extends Controller
{
    public function index()
    {
        $Hari = Hari::all();
        $data = [
            'Hari' => $Hari->toArray()
        ];
        return view('Hari', $data);
    }

    public function tambah(Request $request)
    {
        $rules = [
            'nama_hari' => ['required'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $url = URL::to('api/Hari');
        $client = new Client();
        $client = $client->post($url, ['form_params' => $request->all()]);
        if ($client->getStatusCode() == 200) {
            dd("Berhasil");
        }
        dd("gagal");
    }
}
