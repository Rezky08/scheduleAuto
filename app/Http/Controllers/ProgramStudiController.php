<?php

namespace App\Http\Controllers;

// masukin yang diperluin buat file ini
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
        try {
            $program_studi = program_studi::all();
            $response = [
                'status' => 200,
                'data' => $program_studi
            ];
            return response()->json($response, 200);
        } catch (\Throwable $e) {
            $response = [
                'status' => 500,
                'message' => $e
            ];
            return response()->json($response, 500);
        }
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
        // validasi inputan
        // ngecek ada inputan yang nama nya kode_prodi sama nama_prodi dengan rules begitu
        $rules = [
            'kode_prodi' => ['required', 'unique:program_studi,kode_prodi', 'max:10'],
            'nama_prodi' => ['required']
        ];
        // rules nya cek di web laravel aja

        // Validator itu semacam package harus di 'use' di awal
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            // kalo inputanya ga sesuai rules, dia bakal balikin error
            $response = [
                'status' => 400,
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $insertToDB = [
            'kode_prodi' => $request->kode_prodi,
            'nama_prodi' => $request->nama_prodi,
            'created_at' => now(),
            'updated_at' => now()
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
            'message' => 'Program Studi ' . $request->nama_prodi . ' (' . $request->kode_prodi . ') Berhasil ditambahkan'
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
