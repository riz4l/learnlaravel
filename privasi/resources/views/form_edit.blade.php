@extends('template/t_index')

@section('content')

<!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
							  	@if(Session::has('message'))
									  <div class="alert alert-danger alert-dismissable">
									    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									    <strong>Warning!</strong> {{ Session::get('message') }}
									  </div>
									@endif
								<h3 class="page-header">Form Mahasiswa <a href="{{ url('read') }}" style="float:right" class=" btn btn-primary btn-sm"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a></h2>
							    {!! Form::open(['url' => '/prosesedit','files'=>'true']) !!}
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
							    		<label>Photo</label>
							    	{!! Form::input('file','file_photo', '') !!}
							    		@if($siswa->photo=="")
							    	    <img src="{{ url('photos/no_image.png') }}" width="90">
							    	    @else
							    	    <img src="{{ url('photos/' . $siswa->photo) }}" width="90">
							    	    @endif
							    	</div>
							    	<div class="form-group">
							    		{!! Form::submit('Ubah Data', ['class'=> 'btn btn-danger']) !!}
							    	</div>
			   					{!! Form::close() !!}
					</div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
@stop