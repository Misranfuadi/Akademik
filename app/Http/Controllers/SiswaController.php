<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Siswa;
use App\Telepon;

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
            'nomor_telepon' => 'sometimes|nullable|numeric|digits_between:10,15|unique:telepon,nomor_telepon'
        ]);

        if ($validator->fails()) {
            return redirect('siswa/create')->withInput()->withErrors($validator);
        }
        $siswa = Siswa::create($input);
        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);
        return redirect('siswa');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->nomor_telepon = $siswa->telepon->nomor_telepon;

        return view('pages.siswa.edit',compact('siswa'));
    }

    public function update($id,Request $request)
    {
        $siswa = Siswa::findOrFail($id);
        $input = $request->all();
        $validator = Validator::make($input,[
            'nisn' => 'required|string|size:4|unique:siswa,nisn,' .$request->input('id'),
            'nama_siswa' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nomor_telepon' => 'sometimes|numeric|digits_between:10,15
                                |unique:telepon,nomor_telepon,'.$request->input('id').',id_siswa',
        ]);

        if ($validator->fails()) {
            return redirect('siswa/'.$id.'/edit')->withInput()->withErrors($validator);
        }
        $siswa->update($request->all());

        $telepon = $siswa->telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);
        return redirect('siswa');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect('siswa');
    }
}
