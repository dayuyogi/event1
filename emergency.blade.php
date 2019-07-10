@extends('template.admin')

@section('title')
  Emergency Contact - SI Wisata
@endsection


@section('judulmenu')
  Master Data Emergency Contact
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

  @if($act=="viewTambahEmergency")
    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah Emergency Contact</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" enctype="multipart/form-data" action="{{ asset('sipar/emergency/prosestambahemergency') }}" method="post">
                  {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group{{ $errors->has('emergency_name') ? ' has-error' : '' }}">
                            <label for="emergency_name" class="col-md-2 control-label">Nama Emergency</label>
                            <div class="col-md-6">
                            <input id="emergency_name" type="text" class="form-control" name="emergency_name" placeholder="Masukkan Nama Emergency" value="{{ old('emergency_name') }}" required autofocus>
                                @if ($errors->has('emergency_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('emergency_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                      </div>
                         <div class="form-group{{ $errors->has('emergency_phone') ? ' has-error' : '' }}">
                            <label for="emergency_phone" class="col-md-2 control-label">Nomor Emergency</label>
                            <div class="col-md-6">
                            <input id="emergency_phone" type="text" class="form-control" name="emergency_phone" placeholder="Masukkan Nomor Emergency" value="{{ old('emergency_phone') }}" required autofocus>
                                @if ($errors->has('emergency_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('emergency_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                      </div>
                      <div class="form-group{{ $errors->has('emergency_alamat') ? ' has-error' : '' }}">
                            <label for="emergency_alamat" class="col-md-2 control-label">Alamat Emergency</label>
                            <div class="col-md-6">
                            <input id="emergency_alamat" type="text" class="form-control" name="emergency_alamat" placeholder="Masukkan Alamat Emergency" value="{{ old('emergency_alamat') }}" required autofocus>
                                @if ($errors->has('emergency_alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('emergency_alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                      </div>
                    <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
                            <label for="latitude" class="col-md-2 control-label">Latitude</label>
                            <div class="col-md-6">
                            <input id="latitude" type="text" class="form-control" name="latitude" placeholder="Masukkan Latitude" value="{{ old('latitude') }}" required autofocus>
                                @if ($errors->has('latitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                      </div>
                       <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
                            <label for="longitude" class="col-md-2 control-label">Longitude</label>
                            <div class="col-md-6">
                            <input id="longitude" type="text" class="form-control" name="longitude" placeholder="Masukkan Longitude" value="{{ old('longitude') }}" required autofocus>
                                @if ($errors->has('longitude'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('longitude') }}</strong>
                                    </span>
                                @endif
                            </div>
                      </div>
                      <div class="form-group">
                      <label class="col-sm-2 control-label" for="emergency_photo">Foto Emergency</label>
                      <div class="col-sm-10">
                        <input id="emergency_photo" name="emergency_photo" type="file">
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <a href="{{ asset('sipar/emergency') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
        </div>
    </div>
  @endif


  @if($act=="viewEditEmergency")
    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Emergency</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form class="form-horizontal" enctype="multipart/form-data" action="{{ asset('sipar/emergency/proseseditemergency') }}" method="post">
                  {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="emergency_name" class="col-sm-2 control-label">Nama Emergency</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="emergency_name" name="emergency_name" value="{{ $emergency->emergency_name }}">
                        <input type="hidden" class="form-control" id="emergency_id" name="emergency_id" value="{{ $emergency->emergency_id }}">
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="emergency_phone" class="col-sm-2 control-label">Nomor Emergency</label>
                      <div class="col-sm-8">
                     <input type="text" class="form-control" id="emergency_phone" name="emergency_phone" value="{{ $emergency->emergency_phone }}">
                    </div>
                  </div>
                    <div class="form-group">
                      <label for="emergency_alamat" class="col-sm-2 control-label">Alamat Emergency </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="emergency_alamat" name="emergency_alamat" value="{{ $emergency->emergency_alamat }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="longitude">Longitude</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $emergency->longitude }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="latitude">Latitude</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $emergency->latitude }}">
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="col-sm-2 control-label" for="emergency_photo">Photo</label>
                      <div class="col-sm-10">
                        <input id="emergency_photo" name="emergency_photo" type="file" value="{{ $emergency->emergency_photo }}">
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <a href="{{ asset('sipar/emergency') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Edit</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
        </div>
    </div>
  @endif

  @if($act=="viewEmergency" || $act=="viewDeleteEmergency")

  
    @if (isset($msg))
      <?php  echo viewMessage($msg); ?>
    @endif

    @if ($act=="viewDeleteEmergency")

        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Info!</h4>
          Hapus Contact <strong> {{ $emergency_del->emergency_name }} </strong> ?
            <a href="{{ asset('sipar/emergency') }}" class="btn-sm btn-primary">Cancel</a>
            <a href="{{ url('sipar/emergency/prosesdeleteemergency',$emergency_del->emergency_id) }}" class="btn-sm btn-danger">Hapus</a>
        </div>


    @endif



    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Emergency Contact</h3>
                  <a href="{{ asset('sipar/emergency/viewtambahemergency') }}" class="btn btn-info pull-right">Tambah</a>
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
                    <th>Nama Emergency</th>
                    <th>Nomor Emergency</th>
                    <th>Alamat</th>
                    <th>latitude</th>
                    <th>longitude</th>
                    <th>Photo</th>
                    <th>Peta</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp

                  @foreach ($emergency as $m)
                     <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $m->emergency_name }}</td>
                      <td>{{ $m->emergency_phone }}</td>
                      <td>{{ $m->emergency_alamat }}</td>
                      <td> {{ $m->latitude}}</td>
                      <td> {{ $m->longitude}}</td>
                      <td><img id="myImg" src="{{ asset ($m->emergency_photo) }}" alt="gambar.jpg" style="width:50%;max-width:100px"></td>
                      <td><a href="{{ url('sipar/emergency/viewpetaemergency',$m->emergency_id) }}" class="btn btn-sm btn-info">Lihat Peta</a></td>
                      <td>
                        <a href="{{ url('sipar/emergency/vieweditemergency',$m->emergency_id) }}" class="btn-sm btn-warning "><i class="fa fa-edit"></i></a></a><br><br>
                        <a href="{{ url('sipar/emergency/viewdeleteemergency',$m->emergency_id) }}" class="btn-sm btn-danger "><i class="fa fa-trash"></i></a>   
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
    @if($act=="viewPetaEmergency")

        <div class="row">
          <div class="col-md-4">
            <div class="box box-info">

                <table class="table table-striped">
                  <tr>
                    <td class="col-sm-3">Emergency</td>
                    <td>: {{ $emergency->emergency_name }}</td>
                  </tr>
                  <tr>
                    <td class="col-sm-3">Alamat</td>
                    <td>: {{ $emergency->emergency_alamat }}</td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="col-md-8">
            <div class="box box-info">
                <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q={{ $emergency->latitude }},{{ $emergency->longitude }}&amp;key=AIzaSyAtiHNvnCKNq02zwtH1uRJc3CVx1ZUuo5o"></iframe>

              </div>
            </div>
          </div>
        </div>
@endif


@endsection