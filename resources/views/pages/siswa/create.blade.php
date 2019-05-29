@extends('template')

@section('main')
<div class="row justify-content-md-center py-md-3">
    <div class="card col-md-8" id="siswa">
        <h4 class="card-header bg-dark text-light mb-3">Tambah Siswa</h4>
        <div class="card-body">
            {!! Form::open (['url'=> 'siswa']) !!}
                @include('pages.siswa.form',['submitButtonText'=>'Tambah Siswa'])
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('footer')
@endsection
