<?php

namespace App\Http\Controllers\views;

use App\Http\Controllers\Controller;
use App\Jam;
use App\Helpers\Host;
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

        $rules = [
            'jam_mulai' => ['required', 'date_format:H:i:s'],
            'jam_selesai' => ['required', 'date_format:H:i:s'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $host = new Host();
        $url = $host->host('api') . 'jam';
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
