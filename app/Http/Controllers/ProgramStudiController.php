<?php

namespace App\Http\Controllers;

use App\ProgramStudi as program_studi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgramStudiController extends Controller
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
    // menambahkan program studi ke database
    public function store(Request $request)
    {
        $rules = [
            'kode_prodi' => ['required', 'unique:program_studi,kode_prodi', 'max:10'],
            'nama_prodi' => ['required']
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
            'kode_prodi' => $request->kode_prodi,
            'nama_prodi' => $request->nama_prodi
        ];
        try {
            program_studi::insert($insertToDB);
        } catch (\Throwable $e) {
            $response = [
                'status' => 500,
                'message' => $e
            ];
            return response()->json($response, 500);
        }

        $response = [
            'status' => 200,
            'message' => 'Program Studi ' . $request->nama_prodi . '(' . $request->kode_prodi . ') Berhasil ditambahkan'
        ];
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProgramStudi  $programStudi
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramStudi $programStudi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProgramStudi  $programStudi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgramStudi $programStudi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProgramStudi  $programStudi
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramStudi $programStudi)
    {
        //
    }
}
