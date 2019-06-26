@extends('template')

@section('main')
    <div class="row justify-content-center ">
        <div class="col-md-8 py-md-3" id="siswa">
            <div class="card">
                <h4 class="card-header bg-dark text-light">Siswa</h4>
                @if ($message = Session::get('flsh_massage'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="card-body">
                    <div class="row">
                        {!! Form::open(['url'=> 'siswa/cari', 'method' => 'get','class'=>'form-inline mb-4']) !!}
                            <div class="mr-3">
                                {!! Form::select('id_kelas',$list_kelas,(!empty($id_kelas)? $id_kelas:null),['id'=>'id_kelas','class'=>'form-control','placeholder'=>'-Kelas-']) !!}
                            </div>
                            <div class="mr-3">
                                {!! Form::select('jenis_kelamin',['L'=>'Laki-laki','P'=>'Perempuan'],(!empty($jenis_kelamin)? $jenis_kelamin:null),['id'=>'jenis_kelamin','class'=>'form-control','placeholder'=>'-Gender-']) !!}
                            </div>
                            <div class="input-group">
                                {!! Form::text('kata_kunci',(!empty($kata_kunci))? $kata_kunci : null,['class'=>'form-control mr-sm-3', 'placeholder'=>'Cari Nama Siswa']) !!}
                            </div>
                            <div class="input-group-btn">
                                {!! Form::button ('<i class="fas fa-search"></i>',['class'=>'btn btn-outline-info my-2 my-sm-0','type'=>'submit']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="row">
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
                                            @if(Auth::check())
                                            <th>{{ link_to('siswa/create','Tambah',['class'=>'btn btn-primary btn-sm']) }}</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($siswa_list)>0)
                                    @foreach ($siswa_list as $siswa)
                                        <tr>
                                            <td>{{ $siswa->nisn }}</td>
                                            <td>{{ $siswa->nama_siswa }}</td>
                                            <td>{{ $siswa->kelas->nama_kelas }}</td>
                                            <td>{{ $siswa->tanggal_lahir->format('d-m-Y') }}</td>
                                            <td>{{ $siswa->jenis_kelamin }}</td>
                                            <td>{{ !empty($siswa->telepon->nomor_telepon) ? $siswa->telepon->nomor_telepon: '-' }}</td>
                                            @if(Auth::check())
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
                                            @endif
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td>Tidak ada data siswa</td>
                                    </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="row">
                        <nav aria-label="Page navigation example">
                            <strong>Jumlah Siswa : {{ $jumlah_siswa }}</strong>
                            <ul class="pagination justify-content-center">
                                {{ $siswa_list->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
