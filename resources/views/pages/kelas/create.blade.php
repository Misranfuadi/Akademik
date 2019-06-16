@extends('template')

@section('main')
<div class="row justify-content-md-center py-md-3">
    <div class="card col-md-8" id="kelas">
        <h4 class="card-header bg-dark text-light mb-3">Tambah Kelas</h4>
        <div class="card-body">
            {!! Form::open (['url'=> 'kelas','class'=>'form-horizontal']) !!}
                @include('pages.kelas.form',['submitButtonText'=>'Tambah Kelas'])
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('footer')
@endsection
