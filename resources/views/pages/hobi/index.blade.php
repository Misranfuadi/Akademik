@extends('template')

@section('main')
    <div class="row justify-content-md-center py-md-3">
        <div class="card" id="hobi">
            <h4 class="card-header bg-dark text-light mb-3">Hobi</h4>
            @if ($message = Session::get('flsh_massage'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="card-body">
                <div class="row">
                    @if (!empty($hobi_list))
                        <div class="table-responsive-sm">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Hobi</th>
                                        <th>{{ link_to('hobi/create','Tambah',['class'=>'btn btn-primary btn-sm']) }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($hobi_list as $hobi)
                                    <tr>
                                        <td>{{ ++$nomor }}</td>
                                        <td>{{ $hobi->nama_hobi }}</td>
                                        <td>
                                            <div class="box-button">
                                                {{ link_to('hobi/'.$hobi->id.'/edit','Edit',['class'=>'btn btn-warning btn-sm']) }}
                                            </div>
                                            <div class="box-button">
                                                {!! Form::open(['method'=> 'Delete','action'=>['HobiController@destroy',$hobi->id]]) !!}
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
                    <p>Tidak ada data Hobi</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
