@extends('template')

@section('main')
    <div class="row justify-content-md-center py-md-3">
        <div class="card col-md-8" id="siswa">
            <h4 class="card-header bg-dark text-light mb-3">Siswa</h4>
            <div class="card-body">
            @if (!empty($siswa_list))
                <table class="table">
                    <thead class="table-primary">
                      <tr>
                        <th scope="col">NISN</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tgl Lahir</th>
                        <th scope="col">Gender</th>
                        <th scope="col"><a href="siswa/create" class="btn btn-primary btn-sm">Tambah</a></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($siswa_list as $siswa)
                        <tr>
                            <td>{{ $siswa->nisn }}</td>
                            <td>{{ $siswa->nama_siswa }}</td>
                            <td>{{ $siswa->tanggal_lahir }}</td>
                            <td>{{ $siswa->jenis_kelamin }}</td>
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
            @else
             <p>Tidak ada data siswa</p>
            @endif
            <div class="pull-left">
                <strong>Jumlah Siswa : {{ $jumlah_siswa }}</strong>
            </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
