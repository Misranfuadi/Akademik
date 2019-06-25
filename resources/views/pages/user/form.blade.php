@if (isset($user))
    {!! Form::hidden('id',$user->id) !!}
@endif

<div class="form-group row">
    {!! Form::label ('name','Nama',['class'=>'col-sm-3 col-form-label']) !!}
    <div class="col-sm-9">
        {!! Form::text ('name', null,['class'=>'form-control ']) !!}
        @error('name')
            <div class="bg-danger text-light">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    {!! Form::label ('email','Email',['class'=>'col-sm-3 col-form-label']) !!}
    <div class="col-sm-9">
        {!! Form::text ('email',null,['class'=>'form-control']) !!}
        @error('email')
        <div class="bg-danger text-light">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    {!! Form::label ('level','Level',['class'=>'col-sm-3 col-form-label pt-0']) !!}
    <div class="col-sm-9">
        <div class="form-check">
            {!! Form::radio ('level','operator',null,['class'=>'form-check-input']) !!}
            <label class="form-check-label">Operator</label>
        </div>
        <div class="form-check">
            {!! Form::radio ('level','admin',null,['class'=>'form-check-input']) !!}
            <label class="form-check-label">Admin</label>
        </div>
        @error('level')
            <div class="bg-danger text-light">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    {!! Form::label ('password','Password',['class'=>'col-sm-3 col-form-label']) !!}
    <div class="col-sm-9">
        {!! Form::password ('password',['class'=>'form-control']) !!}
        @error('password')
        <div class="bg-danger text-light">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
        {!! Form::label ('password_confirmation','Password Confirm',['class'=>'col-sm-3 col-form-label']) !!}
        <div class="col-sm-9">
            {!! Form::password ('password_confirmation',['class'=>'form-control']) !!}
            @error('password_confirmation')
            <div class="bg-danger text-light">{{ $message }}</div>
            @enderror
        </div>
    </div>

<div class="form-group">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
</div>
