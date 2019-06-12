@extends('template')

@section('main')
<div class="row justify-content-md-center py-md-3">
    <div class="card col-md-8" id="siswa">
        <h4 class="card-header bg-dark text-light mb-3">Eidt Siswa</h4>
        <div class="card-body">
            {!! Form::model ($siswa,['class'=>'form-horizontal','method'=>'PATCH','files'=> true, 'action'=>['SiswaController@update', $siswa->id]]) !!}
                @include('pages.siswa.form',['submitButtonText'=>'Update Siswa'])
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('footer')
@endsection
