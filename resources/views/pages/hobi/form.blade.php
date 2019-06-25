@if (isset($hobi))
    {!! Form::hidden('id',$hobi->id) !!}
@endif

<div class="form-group row">
    {!! Form::label ('nama_hobi','Nama Hobi',['class'=>'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text ('nama_hobi', null,['class'=>'form-control ']) !!}
        @error('nama_hobi')
            <div class="bg-danger text-light">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
</div>
