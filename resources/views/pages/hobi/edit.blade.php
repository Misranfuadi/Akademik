@extends('template')

@section('main')
<div class="row justify-content-md-center py-md-3">
    <div class="card col-md-8" id="hobi">
        <h4 class="card-header bg-dark text-light mb-3">Eidt Hobi</h4>
        <div class="card-body">
            {!! Form::model ($hobi,['class'=>'form-horizontal','method'=>'PATCH', 'action'=>['HobiController@update', $hobi->id]]) !!}
                @include('pages.hobi.form',['submitButtonText'=>'Update Hobi'])
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('footer')
@endsection
