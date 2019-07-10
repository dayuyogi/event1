@extends('template.admin')

@section('title')
	Pengguna
@endsection


@section('judulmenu')
	Master Data Pengguna
@endsection

@section('statusAktif')
  class="active"
@endsection

@php

  function viewMessage($msg){
    $pesan = "";

    if($msg==1)
    {
      $pesan = "Proses tambah data berhasil dilakukan!";
    }elseif($msg==2){
      $pesan = "Error! Proses tambah data gagal dilakukan!";
    }elseif($msg==3){
      $pesan = "Proses edit data berhasil dilakukan!";
    }elseif($msg==4){
      $pesan = "Error! Proses edit data gagal dilakukan!";
    }elseif($msg==5){
      $pesan = "Proses hapus data berhasil dilakukan!";
    }elseif($msg==6){
      $pesan = "Error! Proses hapus data gagal dilakukan!";
    }

    $view = "
      <div class=\"alert alert-info alert-dismissible\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                <h4><i class=\"icon fa fa-info\"></i> Informasi!</h4>
                <strong>".$pesan."</strong>
              </div>

    ";

    return $view;
  }
  
@endphp






@section('maincontent')

@if($act=="viewTambahpengguna")
  	<div class="row">
  	<div class="col-md-12">
  		<div class="box box-info">
  	            <div class="box-header with-border">
  	              <h3 class="box-title">Tambah Pengguna</h3>
  	            </div>
  	            <!-- /.box-header -->
  	            <!-- form start -->
  	            <form class="form-horizontal" action="{{ asset('sipar/pengguna/prosesTambahpengguna') }}" method="post">
                  {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">Nama Pengguna</label>
                            <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" placeholder="Masukkan Nama Pengguna" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                     </div>
                     <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-2 control-label">E-mail</label>
                            <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="email" placeholder="Masukkan E-mail" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                     </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-2 control-label">Password</label>
                            <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" placeholder="Masukkan Password" value="{{ old('password') }}" required autofocus>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                     </div>
                     <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-2 control-label">Konfirmasi Password</label>
                            <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" placeholder="Konfirmasi Password" value="{{ old('password') }}" required autofocus>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                     </div>
                      <div class="form-group">
                      <label for="jabatan" class="col-sm-2 control-label">Jabatan</label>
                      <div class="col-sm-6">
                        <select class="form-control" name="jabatan">
                          <option value="ADMIN">ADMIN</option>
                          <option value="PIMPINAN">PIMPINAN</option>
                          <option value="PETUGAS">PETUGAS</option>
                        </select>
                      </div>
                    </div>
                </div>
  	              <div class="box-footer">
  	                <a href="{{ asset('sipar/pengguna') }}" class="btn btn-default">Cancel</a>
  	                <button type="submit" class="btn btn-info pull-right">Save</button>
  	              </div>
  	            </form>
  	          </div>
  	    </div>
  	</div> 
  @endif


  @if($act=="viewpengguna" || $act=="viewDeletepengguna")

  
    @if (isset($msg))
      <?php  echo viewMessage($msg); ?>
    @endif

    @if ($act=="viewDeletepengguna")

      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-warning"></i> Info!</h4>
        Hapus Pengguna <strong> {{ $pengguna_del->name }} </strong> ?
          <a href="{{ asset('/sipar/pengguna') }}" class="btn-sm btn-primary">Cancel</a>
          <a href="{{ url('/sipar/pengguna/prosesDeletepengguna',$pengguna_del->id) }}" class="btn-sm btn-danger">Hapus</a>
      </div>


    @endif



  	<div class="row">
  	<div class="col-md-12">
  		<div class="box box-info">
  	            <div class="box-header with-border">
  	              <h3 class="box-title">Data Pengguna</h3>
                  <a href="{{ asset('sipar/pengguna/viewTambahpengguna') }}" class="btn btn-info pull-right">Tambah</a>
  	            </div>
  	            <!-- /.box-header -->
  	            <!-- form start -->
  	            <form class="form-horizontal">
  	              <div class="box-body">
  	                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>E-Mail</th>
                    <th>Jabatan</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp

                  @foreach ($pengguna as $m)
                     <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $m->name }}</td>
                      <td>{{ $m->email }}</td>
                      <td>{{ $m->jabatan }}</td>
                      <td>
                        <a href="{{ url('sipar/pengguna/viewDeletepengguna',$m->id) }}" class="btn-sm btn-danger "><i class="fa fa-trash"></i></a>   
                      </td>
                    </tr>

                    @php
                      $i++;
                    @endphp
                  @endforeach
                  
  	              <!-- /.box-body -->
  	             </tbody>
                </table>
  	            </form>
  	          </div>
  	    </div>
  	</div>
  @endif

@endsection