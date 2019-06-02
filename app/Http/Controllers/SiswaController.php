<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Validator;
use App\Siswa;
use App\Telepon;
use App\Kelas;
use App\Hobi;

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
        $this->validate($request,[
            'nisn' => 'required|string|size:4|unique:siswa,nisn',
            'nama_siswa' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|before:5 years ago',
            'jenis_kelamin' => 'required|in:L,P',
            'nomor_telepon' => 'nullable|numeric|digits_between:10,15|unique:telepon,nomor_telepon',
            'id_kelas'  => 'required',

        ]);

        $siswa = Siswa::create($input);
        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);
        $siswa->hobi()->attach($request->input('hobi_siswa'));
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
        $this->validate($request,[
            'nisn' => 'required|string|size:4|unique:siswa,nisn,' .$request->input('id'),
            'nama_siswa' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|before:5 years ago',
            'jenis_kelamin' => 'required|in:L,P',
            'nomor_telepon' => 'nullable|numeric|digits_between:10,15
                                |unique:telepon,nomor_telepon,'.$request->input('id').',id_siswa',
            'id_kelas'  => 'required',
        ]);


        $siswa->update($request->all());

        $telepon = $siswa->telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);

        $siswa->hobi()->sync($request->input('hobi_siswa'));

        return redirect('siswa');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect('siswa');
    }
}
