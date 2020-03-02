<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use App\Jam as jam;
use Illuminate\Http\Request;

class JamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $jam = jam::all();
            $response = [
                'status' => 200,
                'data' => $mata_kuliah
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
    public function store(Request $request)
    {
        $rules = [
            'jam_mulai' => ['required', 'date_format:H:i:s'],
            'jam_selesai' => ['required','date_format:H:i:s'],
        ];
        $request->jam_mulai = strtotime($request->jam_mulai);
        $request->jam_mulai = date('H:i:s',$request->jam_mulai);
        $request->jam_selesai = strtotime( $request->jam_selesai);
        $request->jam_selesai = date('H:i:s',$request->jam_selesai);


        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response = [
                'status' => 400,
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $insertToDB = [
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'created_at' => now(),
            'updated_at' => now()
        ];
        try {
            jam::insert($insertToDB);
        } catch (\Throwable $e) {
            $response = [
                'status' => 500,
                'message' => $e
            ];
            return response()->json($response, 500);
        }

        $response = [
            'status' => 200,
            'message' => 'Mata Kuliah ' . $request->jam_mulai . ' (' . $request->jam_selesai . ') Berhasil ditambahkan'
        ];
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jam  $jam
     * @return \Illuminate\Http\Response
     */
    public function show(Jam $jam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jam  $jam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jam $jam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jam  $jam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jam $jam)
    {
        //
    }
}
