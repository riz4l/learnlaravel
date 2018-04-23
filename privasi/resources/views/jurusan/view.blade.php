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
                        <h3 class="page-header">Data Jurusan</h2>
                        <div class="row">
                          <div class="col-md-6">
                            <a href="{{ url('jurusan') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-list"></span> Data</a>
                            <a href="{{ url('jurusan/tambah') }}" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                          </div>
                          <div class="col-md-6">  
                            {!! Form::open(['method'=>'GET','url'=>'/jurusan/data','role'=>'search']) !!}
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
                                      <th>Jurusan</th>
                                      <th width="20%">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  	<?php $no=1;?>
                                  	@foreach ($jurusan as $data)
                                    <tr>
                                      <td>{{ $no++ }}</td>
                                      <td>{{ $data->jurusan}}</td>
                                      <td>
                                      	<a href="jurusan/edit/{{ $data->id_jurusan }}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a> || 
                                      	<a href="jurusan/delete/{{ $data->id_jurusan }}" onclick="return confirm('Apakah anda yakin?')"  class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                      </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                                {!! $jurusan->render() !!}
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
@stop