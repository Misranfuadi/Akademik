@if (isset($kelas))
    {!! Form::hidden('id',$kelas->id) !!}
@endif

<div class="form-group row">
    {!! Form::label ('nama_kelas','Nama Kelas',['class'=>'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text ('nama_kelas', null,['class'=>'form-control ']) !!}
        @error('nama_kelas')
            <div class="bg-danger text-light">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
</div>
