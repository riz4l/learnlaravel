@extends('template/t_index')

@section('content')

<!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissable">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <strong>Success!</strong> {{ Session::get('message') }}
                        </div>
                        @endif
                        <p></p>
                        <h3 class="page-header">Data Mahasiswa</h2>
                        <div class="row">
                          <div class="col-md-6">
                            <a href="{{ url('mahasiswa') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-list"></span> Data</a>
                            <a href="{{ url('mahasiswa/tambah') }}" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                          </div>
                          <div class="col-md-6">  
                            {!! Form::open(['method'=>'GET','url'=>'/mahasiswa/data','role'=>'search']) !!}
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
                                      <th>Photo</th>
                                      <th width="20%">Action</th>
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
                                      @if($data->photo=="")
                                      <td><img src="{{ url('photos/no_image.png') }}" width="30"></td>
                                      @else
                                      <td><img src="{{ url('photos/' . $data->photo) }}" width="30"></td>
                                      @endif
                                      <td>
                                      	<a href="mahasiswa/edit/{{ $data->id }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a> || 
                                      	<a href="mahasiswa/hapus/{{ $data->id }}" onclick="return confirm('Apakah anda yakin?')"  class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                      </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                                {!! $siswa->render() !!}
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
@stop