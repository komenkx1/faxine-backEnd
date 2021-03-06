<?php

namespace App\Http\Controllers;

use App\Http\Resources\BeritaCollection;
use App\Http\Resources\BeritaResource;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BeritaController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Berita::with('user')->latest()->paginate(10);
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
            "content" => "required|min:10",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        Berita::create([
            "id_user" => auth()->user()->id,
            "judul" => $request->judul,
            "slug" => Str::slug($request->judul),
            "content" => $request->content,
            "cover" => $request->cover,
        ]);
        return response()->json(['message' => 'Berita berhasil ditambahkan'], 201);
    }

    public function search(Request $request)
    {
        $data = Berita::where('judul', "like", "%" . $request->get('query') . "%")->with('user')->get();
        return new BeritaCollection($data);
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
    public function edit(Berita $beritum)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $beritum)
    {
        if ($request->judul) {
            $request['slug'] = Str::slug($request->judul);
        }

        $beritum->update($request->all());
        return response()->json([
            'message' => "Data berhasil diupdate",
            'data' => $beritum
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $beritum)
    {
        $beritum->delete($beritum);
        return response()->json(["message" => "Data telah dihapus"], 200);
    }
}
