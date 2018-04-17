<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-COMPATIBLE" content="IE-Edge">
		<meta name="description" content="Belajar Laravel Bersama Rizki Fahrizal">
		<title>Learn Laravel 5.1 with Rizki Fahrizal</title>
		{!! Html::style('assets/css/bootstrap.min.css') !!}
</head>

<body>
<h2 align="center">Registrasi User</h2>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			@if(Session::has('message'))
				<div class="alert alert-success alert-dismissable">
				   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				   <strong>Success!</strong> {{ Session::get('message') }}
				</div>
			@endif
			<div class="panel panel-default">
			  <div class="panel-heading">Register</div>
			  <div class="panel-body">
			    {!! Form::open(['url' => '/tambahlogin']) !!}
			    	<div class="form-group">
			    		<label>Username</label>
			    	{!! Form::text('username', '', ['placeholder'=> 'Username','class'=> 'form-control']) !!}
			    		@if($errors->has())
			    			<span class="label label-danger">{!! $errors->first('username') !!}</span>
			    		@endif
			    	</div>
			    	<div class="form-group">
			    		<label>Password</label>
			    	{!! Form::input('password', 'password', '', ['placeholder'=> 'Password','class'=> 'form-control']) !!}
			    		@if($errors->has())
			    			<span class="label label-danger">{!! $errors->first('password') !!}</span>
			    		@endif
			    	</div>
			    	<div class="form-group">
			    		{!! Form::submit('Register', ['class'=> 'btn btn-success btn-block']) !!}
			    	</div>
			    {!! Form::close() !!}
			   
			  </div>
			  <div class="panel-footer">
				  	<small align="center">Sudah punya akun? <a href="{{ url('login') }}">Login</a></small>
				</div>
			</div>
		</div>
	</div>
</div>

{!! Html::script('assets/js/jquery-1.10.2.min.js') !!}
{!! Html::script('assets/js/bootstrap.min.js') !!}

</body>

</html>