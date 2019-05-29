<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Siswa;

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

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('pages.siswa.show',compact('siswa'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'nisn' => 'required|string|size:4|unique:siswa,nisn',
            'nama_siswa' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        if ($validator->fails()) {
            return redirect('siswa/create')->withInput()->withErrors($validator);
        }
        Siswa::create($input);
        return redirect('siswa');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('pages.siswa.edit',compact('siswa'));
    }

    public function update($id,Request $request)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());
        return redirect('siswa');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect('siswa');
    }
}
