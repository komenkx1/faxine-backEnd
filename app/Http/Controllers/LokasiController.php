<?php

namespace App\Http\Controllers;

use App\Http\Resources\LokasiCollection;
use App\Http\Resources\LokasiResource;
use App\Models\Lokasi;
use Carbon\Carbon;
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
        $data = Lokasi::latest()->paginate(5);
        return new LokasiCollection($data);
        // return response()->json(new PostCollection($data), 200);
    }

    /**
     * Check Difference date on date now.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkDifferenceDay($startDate)
    {
        //parse string to dateTIme Carbon
        $startDate = Carbon::parse($startDate);
        $now = Carbon::parse(Carbon::now()->format('Y-m-d'));

        //selisih waktu sekarang dengan tanggal mulai
        $dayDifference = $now->diffInDays($startDate, false);

        // dd($dayDifference);
        if ($dayDifference >= 1) {
            return true;
        }
        return false;
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
            "nama_masyarakat" => "required",
            "alamat" => "required",
            "tanggal_mulai" => "required",
            "tanggal_berakhir" => "required",
            "kapasitas" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //check apakah antara hari ini dengan tanggal mulai memiliki selisih
        $dayDifference = $this->checkDifferenceDay($request->tanggal_mulai);

        //jika memiliki selisih maka bole melakukan operasi
        if ($request->tanggal_mulai <= $request->tanggal_berakhir) {
            if ($dayDifference) {
                //by default jika melakuan add data, maka statusnya segera
                $request["status"] = "segera";
                Lokasi::create($request->all());
                return response()->json(['message' => 'Lokasi berhasil ditambahkan'], 201);
            }
            return response()->json(["message" => "Pilih Tanggal Mulai Setelah Hari ini!"], 400);
        }
        return response()->json(["message" => "Tanggal berakhir tidak boleh lebih kecil dari tanggal mulai!"], 400);

        //jika tidak memiliki selisih maka akan menampilkan pesan error
    }

    public function search(Request $request)
    {       
        $data = Lokasi::where('alamat', "like", "%".$request->get('query')."%")->get();
        return new LokasiCollection($data);
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
        $validator = Validator::make($request->all(), [
            "nama_masyarakat" => "required",
            "alamat" => "required",
            "tanggal_mulai" => "required",
            "tanggal_berakhir" => "required",
            "kapasitas" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //check apakah antara hari ini dengan tanggal mulai memiliki selisih
        $dayDifference = $this->checkDifferenceDay($request->tanggal_mulai);
        //jika memiliki selisih maka bole melakukan operasi
        if ($request->tanggal_mulai <= $request->tanggal_berakhir) {
            if ($dayDifference) {
                //by default jika melakuan add data, maka statusnya segera
                $lokasi->update($request->all());
                return response()->json([
                    'message' => "Data berhasil diupdate",
                    'data' => $lokasi
                ], 200);
            }
            //jika tidak memiliki selisih maka akan menampilkan pesan error
            return response()->json(["message" => "Tanggal mulai minimal sehari sebelum hari ini"], 400);
        }
        return response()->json(["message" => "Tanggal berakhir tidak boleh lebih kecil dari tanggal mulai!"], 400);
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
