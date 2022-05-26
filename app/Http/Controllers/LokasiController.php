<?php

namespace App\Http\Controllers;

use App\Http\Resources\LokasiCollection;
use App\Http\Resources\LokasiResource;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lokasi::paginate(10);
        return new LokasiCollection($data);
        // return response()->json(new PostCollection($data), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "alamat" => "required",
            "tanggal_mulai" => "required",
            "tanggal_berakhir" => "required",
            "kapasitas" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        //by default jika melakuan add data, maka statusnya segera
        $request["status"] = "segera";

        Lokasi::create($request->all());
        return response()->json(['message' => 'Lokasi berhasil ditambahkan'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(Lokasi $lokasi)
    {
        return new LokasiResource($lokasi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Lokasi $lokasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        $lokasi->update($request->all());
        return response()->json([
            'message' => "Data berhasil diupdate",
            'data' => $lokasi
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();
        return response()->json([
            'message' => "Data berhasil dihapus"
        ], 200);
    }
}
