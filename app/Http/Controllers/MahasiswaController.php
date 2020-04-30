<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Controllers;

class MahasiswaController extends Controller
{
    public function index()
    {
        $headers = 'Mahasiswa Page';
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa] , ['headers' => $headers]);
    }
}