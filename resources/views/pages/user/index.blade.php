@extends('template')

@section('main')
    <div class="row justify-content-md-center py-md-3">
        <div class="card" id="user">
            <h4 class="card-header bg-dark text-light mb-3">User</h4>
            @if ($message = Session::get('flsh_massage'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="card-body">
                <div class="row">
                        <div class="table-responsive-sm">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>{{ link_to('user/create','Tambah',['class'=>'btn btn-primary btn-sm']) }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if (count($user_list)>0)
                                @foreach ($user_list as $user)
                                    <tr>

                                        <td>{{ ++$nomor }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->level }}</td>
                                        <td>
                                            <div class="box-button">
                                                {{ link_to('user/'.$user->id.'/edit','Edit',['class'=>'btn btn-warning btn-sm']) }}
                                            </div>
                                            <div class="box-button">
                                                {!! Form::open(['method'=> 'Delete','action'=>['UserController@destroy',$user->id]]) !!}
                                                {!! Form::submit('Delete',['class'=> 'btn btn-danger btn-sm']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td>Tidak ada data user</td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
