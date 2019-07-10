@extends('template.admin')

@section('title')
	Wisata - SI Wisata
@endsection


@section('judulmenu')
	Master Data Wisata
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

  @if($act=="viewLaporan")

  
    @if (isset($msg))
      <?php  echo viewMessage($msg); ?>
    @endif

  	<div class="row">
  	<div class="col-md-12">
  		<div class="box box-info">
  	            <div class="box-header with-border">
  	              <h3 class="box-title pull-center">Data Wisata</h3>
                  <a href="{{ asset('sipar/wisata/cetak_pdf') }}" class="btn btn-info pull-right">CETAK PDF</a>
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
                    <th>Nama Wisata</th>
                    <th>Alamat Wisata</th>
                    <th>Harga</th>
                    <th>Jam Buka</th>
                    <th>Jam Tutup</th>
                    <th>Gambar</th>
                    <th>Peta</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp

                  @foreach ($wisata as $m)
                     <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $m->wisata_name }}</td>
                      <td>{{ $m->wisata_alamat }}</td>
                      <td>{{$m->harga}}</td>
                      <td>{{ $m->open_time }}</td>
                      <td>{{ $m->close_time }}</td>
                      <td><img id="myImg" src="{{ asset ($m->gambar) }}" alt="gambar.jpg" style="width:50%;max-width:100px"></td>
                      <td><a href="{{ url('sipar/wisata/viewpetawisata',$m->wisata_id) }}" class="btn btn-sm btn-info pull-right">Lihat Peta</a></td>
                      <td>
                        <a href="{{ url('sipar/wisata/viewDetailWisata',$m->wisata_id) }}" class="btn-sm btn-primary "><i class="fa fa-info-circle"></i></a> <br><br>
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