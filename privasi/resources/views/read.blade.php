@extends('template/t_index')

@section('content')

<div class="container">
  @if(Session::has('message'))
  <div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Success!</strong> {{ Session::get('message') }}
  </div>
@endif
  <p></p>
  <h2 style="border-bottom:solid 1px #d8d0d0;">Data Mahasiswa <small style="float:right;">{{ Auth::user()->username }} <a href="{{ url('logout')}}">|| Logout</a></small></h2>
  <div class="row">
    <div class="col-md-6">
      <a href="{{ url('home') }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-home"></span> Home</a>
      <a href="{{ url('read') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-list"></span> Data</a>
      <a href="{{ url('formtambah') }}" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
    </div>
    <div class="col-md-6">  
      {!! Form::open(['method'=>'GET','url'=>'/cari','role'=>'search']) !!}
      <div class="input-group">
        <input type="text" class="form-control input-sm" name="search" placeholder="search..">
        <span class="input-group-btn">
          <button class="btn btn-default btn-sm" type="button">Go!</button>
        </span>
      </div><!-- /input-group -->
      {!! Form::close() !!}
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Semester</th>
                <th>Jurusan</th>
                <th width="15%">Action</th>
              </tr>
            </thead>
            <tbody>
            	<?php $no=1;?>
            	@foreach ($siswa as $data)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->alamat}}</td>
                <td>{{ $data->semester}}</td>
                <td>{{ $data->jurusan}}</td>
                <td>
                	<a href="formedit/{{ $data->id }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a> || 
                	<a href="hapus/{{ $data->id }}" onclick="return confirm('Apakah anda yakin?')"  class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $siswa->render() !!}
          <hr>
          <h5 align="center">Copyright Rizki Fahrizal 2018</h5>
    </div>
  </div>
</div>
@stop