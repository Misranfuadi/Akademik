<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $halaman = 'siswa';
        $siswa_list = Siswa::all()->sortBy('nama_siswa');
        $jumlah_siswa = $siswa_list->count();

        return view('siswa.index',compact('halaman', 'siswa_list','jumlah_siswa'));
    }
    public function create()
    {
        $halaman = 'siswa';
        return view('siswa.create',compact('halaman'));
    }

    public function show($id)
    {
        $halaman = 'siswa';
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show',compact('halaman','siswa'));
    }

    public function store(Request $request)
    {

    }
}
