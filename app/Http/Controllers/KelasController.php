<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\KelasRequest;
use App\Kelas;
use Session;

class KelasController extends Controller
{
    public function index()
    {
        $nomor = 0;
        $kelas_list = Kelas::orderBy('nama_kelas', 'asc')->get();
        return view('pages.kelas.index', compact('kelas_list', 'nomor'));
    }
    public function create()
    {
        return view('pages.kelas.create');
    }
    public function store(KelasRequest $request)
    {
        Kelas::create($request->all());
        Session::flash('flash_message', 'Data kelas berhasil disimpan.');
        return redirect('kelas');
    }
    public function edit(Kelas $kelas)
    {
        return view('pages.kelas.edit', compact('kelas'));
    }
    public function update(Kelas $kelas, KelasRequest $request)
    {
        $kelas->update($request->all());
        Session::flash('flash_message', 'Data kelas berhasil diupdate.');
        return redirect('kelas');
    }
    public function destroy(Kelas $kelas)
    {
        Session::flash('flash_message', 'Data kelas berhasil dihapus.');
        return redirect('kelas');
    }
}
