@extends('template')

@section('main')
<div class="row justify-content-md-center py-md-3">
    <div class="card col-md-8" id="siswa">
        <h4 class="card-header bg-dark text-light mb-3">Tambah Siswa</h4>
        <div class="card-body">
            {!! Form::open (['url'=> 'siswa']) !!}
                <div class="form-group">
                    {!! Form::label ('nisn','NISN:',['class'=>'control-label']) !!}
                    {!! Form::text ('nisn', '',['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label ('nama_siswa','Nama:',['class'=>'control-label']) !!}
                    {!! Form::text ('nama_siswa', '',['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label ('tanggal_lahir','Tanggal Lahir:',['class'=>'control-label']) !!}
                    {!! Form::date ('tanggal_lahir','',['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label ('jenis_kelamin','Jenis Kelamin:',['class'=>'control-label']) !!}
                    <div class="radio">
                        <label>{!! Form::radio ('jenis_kelamin','L') !!}Laki-Laki</label>
                    </div>
                    <div class="radio">
                        <label>{!! Form::radio ('jenis_kelamin','P') !!}Perempuan</label>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::submit('Tambah Siswa', ['class'=> 'btn btn-primary col-md-4']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('footer')
    <div class="bg-primary text-white" id="footer">
        <p>&copy; 2019 laravelapp.dev</p>
    </div>
@endsection
