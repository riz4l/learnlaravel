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
			    {!! Form::open(['url' => '/prosestambah']) !!}
			    	<div class="form-group">
			    		<label>Nama</label>
			    	{!! Form::text('nama', '', ['placeholder'=> 'Nama','class'=> 'form-control']) !!}
			    	</div>
			    	<div class="form-group">
			    		<label>Alamat</label>
			    	{!! Form::textarea('alamat', '', ['placeholder'=> 'Alamat','class'=> 'form-control', 'cols'=>'3', 'rows'=>'3']) !!}
			    	</div>
			    	<div class="form-group">
			    		<label>Semester</label>
			    	{!! Form::text('semester', '', ['placeholder'=> 'Semester','class'=> 'form-control']) !!}
			    	</div>
			    	<div class="form-group">
			    		<label>Jurusan</label>
			    	{!! Form::select('id_jurusan', $jurusan, null, ['placeholder' => 'Select Jurusan...', 'class'=> 'form-control' ]) !!}
			    	</div>
			    	<div class="form-group">
			    		{!! Form::submit('Tambah Data', ['class'=> 'btn btn-danger']) !!}
			    	</div>
			    {!! Form::close() !!}
			  
			  </div>
			</div>
			<hr>
			<h5 align="center">Copyright Rizki Fahrizal 2018</h5>
			  @stop
		</div>
	</div>
</div>