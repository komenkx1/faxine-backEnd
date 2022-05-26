<?php

namespace App\Http\Controllers;

use App\Http\Resources\BeritaCollection;
use App\Http\Resources\BeritaResource;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{


    // public function __constructor()
    // {
    //     $this->middleware('auth:sanctum');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Berita::with('user')->paginate(10);
        return new BeritaCollection($data);
        // return response()->json(new BeritaCollection($data), 200);
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
            "judul" => "required",
            "slug" => "required|unique:berita",
            "tanggal_pembuatan" => "required",
            "content" => "required|min:10",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        Berita::create([
            "id_user" => auth()->user()->id,
            "judul" => $request->judul,
            "slug" => $request->slug,
            "tanggal_pembuatan" => $request->tanggal_pembuatan,
            "content" => $request->content,
            "cover" => $request->cover,
        ]);
        return response()->json(['message' => 'Berita berhasil ditambahkan'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        return new BeritaResource($berita);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $berita)
    {
        $berita->update($request->all());
        return response()->json([
            'message' => "Data berhasil diupdate",
            'data' => $berita
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        $berita->delete($berita);
        return response()->json(["message" => "Data telah dihapus"], 200);
    }
}
