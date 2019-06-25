@extends('template')

@section('main')
<div class="row justify-content-md-center py-md-3">
    <div class="card col-md-8" id="user">
        <h4 class="card-header bg-dark text-light mb-3">Tambah User</h4>
        <div class="card-body">
            {!! Form::open (['url'=> 'user','class'=>'form-horizontal']) !!}
                @include('pages.user.form',['submitButtonText'=>'Tambah User'])
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('footer')
@endsection
