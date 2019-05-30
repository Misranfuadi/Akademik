 @if (isset($siswa))
    {!! Form::hidden('id',$siswa->id) !!}
 @endif

 <div class="form-group">
    {!! Form::label ('nisn','NISN:',['class'=>'control-label']) !!}
    {!! Form::text ('nisn', null,['class'=>'form-control ']) !!}
    @error('nisn')
    <div class="bg-danger text-light">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label ('nama_siswa','Nama:',['class'=>'control-label']) !!}
    {!! Form::text ('nama_siswa',null,['class'=>'form-control']) !!}
    @error('nama_siswa')
    <div class="bg-danger text-light">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label ('tanggal_lahir','Tanggal Lahir:',['class'=>'control-label']) !!}
    {!! Form::date ('tanggal_lahir', !empty($siswa)?$siswa->tanggal_lahir->format('Y-m-d'):null,['class'=>'form-control']) !!}
    @error('tanggal_lahir')
    <div class="bg-danger text-light">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label ('jenis_kelamin','Jenis Kelamin:',['class'=>'control-label']) !!}
    <div class="radio">
        <label>{!! Form::radio ('jenis_kelamin','L') !!}Laki-Laki</label>
    </div>
    <div class="radio">
        <label>{!! Form::radio ('jenis_kelamin','P') !!}Perempuan</label>
    </div>
    @error('jenis_kelamin')
    <div class="bg-danger text-light">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
</div>
