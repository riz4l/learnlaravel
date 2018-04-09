@extends('template/t_index')

@section('content')

<h1 align="center">Belajar Laravel 5.1</h1>
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
			  <div class="panel-heading">CRUD WITH LARAVEL <a href="{{ url('read') }}" title="click to see data" style="float:right;"><b>Data</b></a></div>
			  <div class="panel-body">
			    {!! Form::open(['url' => '/prosesedit']) !!}
			    {!! Form::hidden('id', $siswa->id, ['placeholder'=> 'id','class'=> 'form-control']) !!}
			    	<div class="form-group">
			    		<label>Nama</label>
			    	{!! Form::text('nama', $siswa->nama, ['placeholder'=> 'Nama','class'=> 'form-control']) !!}
			    	</div>
			    	<div class="form-group">
			    		<label>Alamat</label>
			    	{!! Form::textarea('alamat', $siswa->alamat, ['placeholder'=> 'Alamat','class'=> 'form-control', 'cols'=>'3', 'rows'=>'3']) !!}
			    	</div>
			    	<div class="form-group">
			    		<label>Semester</label>
			    	{!! Form::text('semester', $siswa->semester, ['placeholder'=> 'Semester','class'=> 'form-control']) !!}
			    	</div>
			    	<div class="form-group">
			    		<label>Jurusan</label>
			    	{!! Form::select('id_jurusan', $jurusan, $siswa->id_jurusan, ['class'=> 'form-control' ]) !!}
			    	</div>
			    	<div class="form-group">
			    		{!! Form::submit('Ubah Data', ['class'=> 'btn btn-danger']) !!}
			    	</div>
			    {!! Form::close() !!}
			    @stop
			  </div>
			</div>
		</div>
	</div>
</div>