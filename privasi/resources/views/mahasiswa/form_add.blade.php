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
								<h3 class="page-header">Form Mahasiswa <a href="{{ url('mahasiswa') }}" style="float:right" class=" btn btn-primary btn-sm"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a></h2>
							    {!! Form::open(['url' => '/prosestambah','files'=>'true']) !!}
							    	<div class="form-group">
							    		<label>Nama</label>
							    	{!! Form::text('nama', '', ['placeholder'=> 'Nama','class'=> 'form-control']) !!}
							    	@if($errors->has())
						    			<span class="label label-danger">{!! $errors->first('nama') !!}</span>
						    		@endif
							    	</div>
							    	<div class="form-group">
							    		<label>Alamat</label>
							    	{!! Form::textarea('alamat', '', ['placeholder'=> 'Alamat','class'=> 'form-control', 'cols'=>'3', 'rows'=>'3']) !!}
							    	@if($errors->has())
						    			<span class="label label-danger">{!! $errors->first('alamat') !!}</span>
						    		@endif
							    	</div>
							    	<div class="form-group">
							    		<label>Semester</label>
							    	{!! Form::text('semester', '', ['placeholder'=> 'Semester','class'=> 'form-control']) !!}
							    	@if($errors->has())
						    			<span class="label label-danger">{!! $errors->first('semester') !!}</span>
						    		@endif
							    	</div>
							    	<div class="form-group">
							    		<label>Jurusan</label>
							    	{!! Form::select('id_jurusan', $jurusan, null, ['placeholder' => 'Select Jurusan...', 'class'=> 'form-control' ]) !!}
							    	</div>
							    	<div class="form-group">
							    		<label>Photo</label>
							    	{!! Form::input('file','file_photo', '') !!}
							    	@if($errors->has())
						    			<span class="label label-danger">{!! $errors->first('file_photo') !!}</span>
						    		@endif
							    	</div>
							    	<div class="form-group">
							    		{!! Form::submit('Tambah Data', ['class'=> 'btn btn-danger']) !!}
							    	</div>
							    {!! Form::close() !!}
					</div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
@stop