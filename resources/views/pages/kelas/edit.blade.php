@extends('template')

@section('main')
<div class="row justify-content-md-center py-md-3">
    <div class="card col-md-8" id="kelas">
        <h4 class="card-header bg-dark text-light mb-3">Eidt Kelas</h4>
        <div class="card-body">
            {!! Form::model ($kelas,['class'=>'form-horizontal','method'=>'PATCH', 'action'=>['KelasController@update', $kelas->id]]) !!}
                @include('pages.kelas.form',['submitButtonText'=>'Update Kelas'])
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('footer')
@endsection
