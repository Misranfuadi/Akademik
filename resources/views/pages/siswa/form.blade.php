@if (isset($siswa))
    {!! Form::hidden('id',$siswa->id) !!}
@endif

<div class="form-group row">
    {!! Form::label ('nisn','NISN',['class'=>'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text ('nisn', null,['class'=>'form-control ']) !!}
        @error('nisn')
            <div class="bg-danger text-light">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    {!! Form::label ('nama_siswa','Nama',['class'=>'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text ('nama_siswa',null,['class'=>'form-control']) !!}
        @error('nama_siswa')
        <div class="bg-danger text-light">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    {!! Form::label('id_kelas', 'Kelas',['class'=>'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        @if (count($list_kelas)>0)
            {!! Form::select('id_kelas', $list_kelas, null,['class'=>'form-control','id'=>'id_kelas','placeholder'=>'Pilih Kelas']) !!}
        @else
            {!! Form::text('id_kelas','Tidak ada kelas',['class'=>'form-control','disabled']) !!}
        @endif
        @error('id_kelas')
        <div class="bg-danger text-light">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    {!! Form::label ('tanggal_lahir','Tanggal Lahir',['class'=>'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::date ('tanggal_lahir', !empty($siswa)?$siswa->tanggal_lahir->format('Y-m-d'):null,['class'=>'form-control']) !!}
        @error('tanggal_lahir')
        <div class="bg-danger text-light">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    {!! Form::label ('jenis_kelamin','Jenis Kelamin',['class'=>'col-sm-2 col-form-label pt-0']) !!}
    <div class="col-sm-10">
        <div class="form-check">
            {!! Form::radio ('jenis_kelamin','L',null,['class'=>'form-check-input']) !!}
            <label class="form-check-label">Laki-Laki</label>
        </div>
        <div class="form-check">
            {!! Form::radio ('jenis_kelamin','P',null,['class'=>'form-check-input']) !!}
            <label class="form-check-label">Perempuan</label>
        </div>
        @error('jenis_kelamin')
            <div class="bg-danger text-light">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    {!! Form::label ('nomor_telepon','No Telepon/Hp',['class'=>'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text ('nomor_telepon',null,['class'=>'form-control']) !!}
        @error('nomor_telepon')
        <div class="bg-danger text-light">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    {!! Form::label ('hobi_siswa','Hobi',['class'=>'col-sm-2 col-form-label pt-0']) !!}
    <div class="col-sm-10">
        @if (count($list_hobi)>0)
            @foreach ($list_hobi as $key => $value)
                <div class="form-check form-check-inline">
                    {!! Form::checkbox('hobi_siswa[]',$key, null,['class'=>'form-check-input']) !!}
                    <label class="form-check-label" > {{ $value }}</label>
                </div>
            @endforeach
        @else
            {!! Form::text('hobi','Tidak ada hobi',['class'=>'form-control','disabled']) !!}
        @endif
    </div>
</div>
<div class="form-group row">
    {!! Form::label ('foto','Foto',['class'=>'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        <div class="input-group-prepend">
            {!! Form::file('foto',['class'=>'input-group-text']) !!}
        </div>
        @error('foto')
            <div class="bg-danger text-light">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
</div>
