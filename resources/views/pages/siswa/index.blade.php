@extends('template')

@section('main')
    <div class="row justify-content-md-center py-md-3">
        <div class="card col-md-8" id="siswa">
            <h4 class="card-header bg-dark text-light mb-3">Siswa</h4>
            @if ($message = Session::get('flsh_massage'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ $message }}</strong>
              </div>
            @endif
            <div class="card-body">
                @if (!empty($siswa_list))
                    <div class="table-responsive-sm">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tgl Lahir</th>
                                <th>Gender</th>
                                <th>Telepon</th>
                                <th><a href="siswa/create" class="btn btn-primary btn-sm">Tambah</a></th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($siswa_list as $siswa)
                                <tr>
                                    <td>{{ $siswa->nisn }}</td>
                                    <td>{{ $siswa->nama_siswa }}</td>
                                    <td>{{ $siswa->kelas->nama_kelas }}</td>
                                    <td>{{ $siswa->tanggal_lahir->format('d-m-Y') }}</td>
                                    <td>{{ $siswa->jenis_kelamin }}</td>
                                    <td>{{ !empty($siswa->telepon->nomor_telepon) ? $siswa->telepon->nomor_telepon: '-' }}</td>
                                    <td>
                                        <div class="box-button">
                                            {{ link_to('siswa/'.$siswa->id,'Detail',['class'=>'btn btn-info btn-sm']) }}
                                        </div>
                                        <div class="box-button">
                                            {{ link_to('siswa/'.$siswa->id.'/edit','Edit',['class'=>'btn btn-warning btn-sm']) }}
                                        </div>
                                        <div class="box-button">
                                            {!! Form::open(['method'=> 'Delete','action'=>['SiswaController@destroy',$siswa->id]]) !!}
                                            {!! Form::submit('Delete',['class'=> 'btn btn-danger btn-sm']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                 <p>Tidak ada data siswa</p>
                @endif

                <nav aria-label="Page navigation example">
                    <strong>Jumlah Siswa : {{ $jumlah_siswa }}</strong>
                  <ul class="pagination justify-content-center">
                    {{ $siswa_list->links() }}
                  </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
