<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StatistikController extends Controller
{
    public function getStatistikCovid()
    {
       $data =  Http::get('https://data.covid19.go.id/public/api/update.json');
       return response()->json($data->json()['update']['total']);
    }
    public function getStatistikVaksinasi()
    {
       $data =  Http::get('https://data.covid19.go.id/public/api/pemeriksaan-vaksinasi.json');
       return response()->json($data->json()['vaksinasi']['total']);
    }
}
