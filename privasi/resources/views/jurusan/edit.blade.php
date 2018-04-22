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
								<h3 class="page-header">Form Jurusan <a href="{{ url('jurusan') }}" style="float:right" class=" btn btn-primary btn-sm"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a></h2>
							    {!! Form::open(['url' => '/jurusaneditdata']) !!}
							    {!! Form::hidden('id_jurusan', $jurusan->id_jurusan, ['placeholder'=> 'id','class'=> 'form-control']) !!}
							    	<div class="form-group">
							    		<label>Jurusan</label>
							    	{!! Form::text('jurusan', $jurusan->jurusan, ['placeholder'=> 'Jurusan','class'=> 'form-control']) !!}
							    	@if($errors->has())
						    			<span class="label label-danger">{!! $errors->first('jurusan') !!}</span>
						    		@endif
							    	</div>
							    	<div class="form-group">
							    		{!! Form::submit('Update Data', ['class'=> 'btn btn-danger']) !!}
							    	</div>
							    {!! Form::close() !!}
					</div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
@stop