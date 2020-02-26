<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Matakuliah as mata_kuliah;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // menambahkan mata kuliah ke database
    public function store(Request $request)
    {
        $rules = [
            'kode_matkul' => ['required', 'unique:mata_kuliah,kode_matkul', 'max:10'],
            'sks_matkul' => ['required', 'numeric'],
            'nama_matkul' => ['required'],
            'status_matkul' => ['boolean'],
            'kode_prodi' => ['required', 'exists:program_studi,kode_prodi'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response = [
                'status' => 400,
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $insertToDB = [
            'kode_matkul' => $request->kode_matkul,
            'sks_matkul' => $request->sks_matkul,
            'nama_matkul' => $request->nama_matkul,
            'status_matkul' => $request->status_matkul,
            'kode_prodi' => $request->kode_prodi
        ];
        try {
            mata_kuliah::insert($insertToDB);
        } catch (\Throwable $e) {
            $response = [
                'status' => 500,
                'message' => $e
            ];
            return response()->json($response, 500);
        }

        $response = [
            'status' => 200,
            'message' => 'Mata Kuliah ' . $request->nama_matkul . ' (' . $request->kode_matkul . ') Berhasil ditambahkan'
        ];
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
