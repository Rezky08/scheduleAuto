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

class KelompokDosenViewController extends Controller
{
    public function index()
    {
        // untuk ambil data mata kuliah dari API
        $host = new Host();
        $url = $host->host('api') . 'kelompok_dosen';
        $reqApi = new Request_api();
        $response = $reqApi->request('GET', $url);

        $data = [];
        // get data mata kuliah
        $data['kelompok_dosen'] = [];
        if ($response['status'] == 200) {
            $kelompok_dosen = $response['data'];
            $kelompok_dosen = collect($kelompok_dosen);
            $kelompok_dosen = $kelompok_dosen->map(function ($item, $index) {
                $item = collect($item)->toArray();
                return $item;
            });
            $data['kelompok_dosen'] = $kelompok_dosen;
        }
        // get data prodi
        // $url = $host->host('api') . 'kelompok_dosen_detail';
        // $response = $reqApi->request('GET', $url);
        // $data['kelompok_dosen_detail'] = [];
        // if ($response['status'] == 200) {
        //     $kelompok_dosen_detail = $response['data'];
        //     $kelompok_dosen_detail = collect($kelompok_dosen_detail);
        //     $kelompok_dosen_detail = $kelompok_dosen_detail->map(function ($item, $index) {
        //         $item = collect($item)->toArray();
        //         return $item;
        //     });
        //     $data['kelompok_dosen_detail'] = $kelompok_dosen_detail;
        // }

        // call modal name
        return view('kelompok_dosen', $data);
    }

    public function add(Request $request)
    {
    }

    public function update(Request $request, $id)
    {
    }


    public function delete($id)
    {
    }
}
