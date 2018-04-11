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
  <h2>Data Mahasiswa</h2>
  <a href="{{ url('home') }}"><span class="glyphicon glyphicon-home"></span> Home</a>
  <a href="{{ url('formtambah') }}"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
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
          <hr>
          <h5 align="center">Copyright Rizki Fahrizal 2018</h5>
    </div>
  </div>
</div>
@stop