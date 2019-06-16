@extends('template')

@section('main')
    <div class="row justify-content-md-center py-md-3">
        <div class="card" id="kelas">
            <h4 class="card-header bg-dark text-light mb-3">Kelas</h4>
            @if ($message = Session::get('flsh_massage'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="card-body">
                <div class="row">
                    @if (!empty($kelas_list))
                        <div class="table-responsive-sm">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>{{ link_to('kelas/create','Tambah',['class'=>'btn btn-primary btn-sm']) }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($kelas_list as $kelas)
                                    <tr>
                                        <td>{{ ++$nomor }}</td>
                                        <td>{{ $kelas->nama_kelas }}</td>
                                        <td>
                                            <div class="box-button">
                                                {{ link_to('kelas/'.$kelas->id.'/edit','Edit',['class'=>'btn btn-warning btn-sm']) }}
                                            </div>
                                            <div class="box-button">
                                                {!! Form::open(['method'=> 'Delete','action'=>['KelasController@destroy',$kelas->id]]) !!}
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
                    <p>Tidak ada data kelas</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
