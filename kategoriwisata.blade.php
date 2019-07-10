@extends('template.admin')

@section('title')
	Kategori Wisata - SI Wisata
@endsection


@section('judulmenu')
	Master Data Kategori Wisata
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

  @if($act=="viewTambahKatwis")
  	<div class="row">
  	<div class="col-md-12">
  		<div class="box box-info">
  	            <div class="box-header with-border">
  	              <h3 class="box-title">Tambah Kategori Wisata</h3>
  	            </div>
  	            <!-- /.box-header -->
  	            <!-- form start -->
  	            <form class="form-horizontal" action="{{ asset('sipar/katwis/prosestambahkatwis') }}" method="post">
                  {!! csrf_field() !!}
  	              <div class="box-body">
  	                 <div class="form-group{{ $errors->has('katwis_name') ? ' has-error' : '' }}">
                            <label for="katwis_name" class="col-md-2 control-label">Kategori Wisata</label>
                            <div class="col-md-6">
                            <input id="katwis_name" type="text" class="form-control" name="katwis_name" placeholder="Masukkan Kategori Wisata" value="{{ old('katwis_name') }}" required autofocus>
                                @if ($errors->has('katwis_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('katwis_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                  </div>
  	              </div>
  	              <!-- /.box-body -->
  	              <div class="box-footer">
  	                <a href="{{ asset('sipar/katwis') }}" class="btn btn-default">Cancel</a>
  	                <button type="submit" class="btn btn-info pull-right">Save</button>
  	              </div>
  	              <!-- /.box-footer -->
  	            </form>
  	          </div>
  	    </div>
  	</div>
  @endif


  @if($act=="viewEditKatwis")
    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Kategori Wisata</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form class="form-horizontal" action="{{ asset('sipar/katwis/proseseditkatwis') }}" method="post">
                  {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="katwis_name" class="col-sm-2 control-label">Kategori Wisata</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="katwis_name" name="katwis_name" value="{{ $katwis->katwis_name }}">
                        <input type="hidden" class="form-control" id="katwis_id" name="katwis_id" value="{{ $katwis->katwis_id }}">
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <a href="{{ asset('sipar/katwis') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Edit</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
        </div>
    </div>
  @endif

  @if($act=="viewKatwis" || $act=="viewDeleteKatwis")

  
    @if (isset($msg))
      <?php  echo viewMessage($msg); ?>
    @endif

    @if ($act=="viewDeleteKatwis")

        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Info!</h4>
          Hapus Kategori <strong> {{ $katwis_del->katwis_name }} </strong> ?
            <a href="{{ asset('sipar/katwis') }}" class="btn-sm btn-primary">Cancel</a>
            <a href="{{ url('sipar/katwis/prosesdeletekatwis',$katwis_del->katwis_id) }}" class="btn-sm btn-danger">Hapus</a>
        </div>


    @endif



  	<div class="row">
  	<div class="col-md-12">
  		<div class="box box-info">
  	            <div class="box-header with-border">
  	              <h3 class="box-title">Data Kategori Wisata</h3>
                  <a href="{{ asset('sipar/katwis/viewtambahkatwis') }}" class="btn btn-info pull-right">Tambah</a>
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
                    <th>Nama Kategori Wisata</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp

                  @foreach ($katwis as $m)
                     <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $m->katwis_name }}</td>
                      <td>
                        <a href="{{ url('sipar/katwis/vieweditkatwis',$m->katwis_id) }}" class="btn-sm btn-warning "><i class="fa fa-edit"></i></a> &nbsp;
                        <a href="{{ url('sipar/katwis/viewdeletekatwis',$m->katwis_id) }}" class="btn-sm btn-danger "><i class="fa fa-trash"></i></a>   
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