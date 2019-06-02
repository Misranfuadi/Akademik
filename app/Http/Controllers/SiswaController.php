<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SiswaRequest;
use App\Siswa,App\Telepon;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa_list = Siswa::orderBy('nama_siswa','asc')->paginate(5);

        $jumlah_siswa = Siswa::count();


        return view('pages.siswa.index',compact( 'siswa_list','jumlah_siswa'));
    }

    public function create()
    {

        return view('pages.siswa.create');
    }

    public function show(Siswa $siswa)
    {
        return view('pages.siswa.show',compact('siswa'));
    }

    public function store(SiswaRequest $request)
    {
        $input = $request->all();
        //simpan data siswa
        $siswa = Siswa::create($input);
        //simpan data telepon
        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);
        //simpan data hobi
        $siswa->hobi()->attach($request->input('hobi_siswa'));

        return redirect('siswa');
    }

    public function edit(Siswa $siswa)
    {
        $siswa->nomor_telepon = $siswa->telepon->nomor_telepon;
         return view('pages.siswa.edit',compact('siswa'));
    }

    public function update(Siswa $siswa,SiswaRequest $request)
    {

        //update data siswa
        $siswa->update($request->all());
        //Update data telepon
        $telepon = $siswa->telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);
         //Update data hobi
        $siswa->hobi()->sync($request->input('hobi_siswa'));

        return redirect('siswa');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect('siswa');
    }
}
