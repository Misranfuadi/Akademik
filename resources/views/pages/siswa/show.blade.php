@extends('template')

@section('main')
    <div class="row justify-content-md-center py-md-3">
        <div class="card col-md-8" id="siswa">
            <h4 class="card-header bg-dark text-light mb-3">Detail Siswa</h4>
            <div class="card-body">
                <table class="table">
                      <tr>
                        <th>NISN</th>
                        <td>{{ $siswa->nisn }}</td>
                      </tr>
                      <tr>
                          <th>Nama</th>
                          <td>{{ $siswa->nama_siswa }}</td>
                      </tr>
                      <tr>
                          <th>Tgl Lahir</th>
                          <td>{{ $siswa->tanggal_lahir->format('d-m-Y') }}</td>
                      </tr>
                        <th>Gender</th>
                        <td>{{ $siswa->jenis_kelamin }}</td>
                      </tr>
                      </tr>
                        <th>Telepon</th>
                        <td>{{ !empty($siswa->telepon_nomor_telepon) ? $siswa->telepon_nomor_telepon: '-' }}</td>
                      </tr>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
