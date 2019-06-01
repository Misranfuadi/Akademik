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
    {!! Form::label ('nomor_telepon','Nomor Telepon:',['class'=>'control-label']) !!}
    {!! Form::text ('nomor_telepon',null,['class'=>'form-control']) !!}
    @error('nomor_telepon')
    <div class="bg-danger text-light">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('id_kelas', 'Kelas:',['class'=>'control-label']) !!}
    @if (count($list_kelas)>0)
        {!! Form::select('id_kelas', $list_kelas, null,['class'=>'form-control','id'=>'id_kelas','placeholder'=>'Pilih Kelas']) !!}
    @else
        {!! Form::text('id_kelas','Tidak ada kelas',['class'=>'form-control','disabled']) !!}
    @endif
    @error('id_kelas')
    <div class="bg-danger text-light">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
</div>
