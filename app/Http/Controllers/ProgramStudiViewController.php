<?php

namespace App\Http\Controllers;

use App\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\URL;

class ProgramStudiViewController extends Controller
{
    public function index()
    {
        $program_studi = ProgramStudi::all();
        $data = [
            'program_studi' => $program_studi->toArray()
        ];
        return view('program_studi', $data);
    }

    public function tambah(Request $request)
    {
        dd('test');
        $rules = [
            'program_studi_mulai' => ['required', 'date_format:H:i:s'],
            'program_studi_selesai' => ['required', 'date_format:H:i:s'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $url = URL::to('api/program_studi');
        $client = new Client();
        $client = $client->post($url, ['form_params' => $request->all()]);
        if ($client->getStatusCode() == 200) {
            dd("Berhasil");
        }
        dd("gagal");
    }
}
