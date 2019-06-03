@extends('template')

@section('main')
    <div class="row justify-content-md-center py-md-3">
        <div class="card col-md-8" id="siswa">
            <h4 class="card-header bg-dark text-light mb-3">Detail Siswa</h4>
            <div class="card-body jumbotron">
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
                          <th>Kelas</th>
                          <td>{{ $siswa->kelas->nama_kelas }}</td>
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
                        <td>{{ !empty($siswa->telepon->nomor_telepon) ? $siswa->telepon->nomor_telepon: '-' }}</td>
                      </tr>
                      <tr>
                        <th>Hobi</th>
                          <td>
                              @foreach ($siswa->hobi as $item)
                                  <strong><span>{{ $item->nama_hobi.',' }}</span></strong>
                              @endforeach
                          </td>
                      </tr>
                      <tr>
                        <th>Foto</th>
                          <td>
                              @if (isset($siswa->foto))
                                  <img src="{{ asset('fotoupload/'.$siswa->foto)}}" class="img-thumbnail w-25 p-3">
                              @else
                                    @if ($siswa->jenis_kelamin == 'L')
                                        <img src="{{ asset('fotoupload/dummymale.png')}}" class="img-thumbnail w-25 p-3"  >
                                    @else
                                        <img src="{{ asset('fotoupload/dummyfemale.jpg')}}" class="img-thumbnail w-25 p-3">
                                    @endif
                              @endif
                          </td>
                      </tr>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
