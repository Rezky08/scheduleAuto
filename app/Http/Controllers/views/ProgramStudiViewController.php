<?php

namespace App\Http\Controllers\views;

use App\Http\Controllers\Controller;
use App\ProgramStudi;
use App\Helpers\Host;
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
        $rules = [
            'kode_prodi' => ['required', 'unique:program_studi,kode_prodi', 'max:10'],
            'nama_prodi' => ['required'],
            'keterangan_prodi' => ['required'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $host = new Host();
        $url = $host->host('api') . 'program_studi';
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
