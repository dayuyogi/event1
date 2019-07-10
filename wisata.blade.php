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

  @if($act=="viewTambahWisata")
  	<div class="row">
  	<div class="col-md-12">
  		<div class="box box-info">
  	            <div class="box-header with-border">
  	              <h3 class="box-title">Tambah Wisata</h3>
  	            </div>
  	            <!-- /.box-header -->
  	            <!-- form start -->
  	            <form class="form-horizontal" enctype="multipart/form-data" action="{{ asset('sipar/wisata/prosestambahwisata') }}" method="post">
                  {!! csrf_field() !!}
  	              <div class="box-body">
                    <div class="form-group{{ $errors->has('wisata_name') ? ' has-error' : '' }}">
                            <label for="wisata_name" class="col-md-2 control-label">Nama Wisata</label>
                            <div class="col-md-6">
                            <input id="wisata_name" type="text" class="form-control" name="wisata_name" placeholder="Masukkan Nama Wisata" value="{{ old('wisata_name') }}" required autofocus>
                                @if ($errors->has('wisata_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('wisata_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="id_puskesmas" class="col-sm-2 control-label">Kecamatan</label>
                          <div class="col-sm-6">
                              <select class="form-control"  name="kecamatan_id" id="kecamatan_id" >
                                  @foreach($kec as $kecamatan)
                                      <option value="{{$kecamatan->kecamatan_id}}">{{$kecamatan->kecamatan_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="id_puskesmas" class="col-sm-2 control-label">Tiket</label>
                          <div class="col-sm-6">
                              <select class="form-control"  name="tiket_id" id="tiket_id" >
                                  @foreach($tiket as $tik)
                                      <option value="{{$tik->tiket_id}}">{{$tik->tiket_type}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="id_puskesmas" class="col-sm-2 control-label">Kategori Wisata</label>
                          <div class="col-sm-6">
                              <select class="form-control"  name="katwis_id" id="katwis_id" >
                                  @foreach($katwis as $wis)
                                      <option value="{{$wis->katwis_id}}">{{$wis->katwis_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div> 
                      <div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
                            <label for="harga" class="col-md-2 control-label">Harga Tiket Wisata</label>
                            <div class="col-md-6">
                            <input id="harga" type="text" class="form-control" name="harga" placeholder="Masukkan Harga Tiket Wisata" value="{{ old('harga') }}" required autofocus>
                                @if ($errors->has('harga'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('harga') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                     <div class="form-group{{ $errors->has('wisata_alamat') ? ' has-error' : '' }}">
                            <label for="wisata_alamat" class="col-md-2 control-label">Alamat Wisata</label>
                            <div class="col-md-6">
                            <input id="wisata_alamat" type="text" class="form-control" name="wisata_alamat" placeholder="Masukkan Alamat Wisata" value="{{ old('wisata_alamat') }}" required autofocus>
                                @if ($errors->has('wisata_alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('wisata') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                        <div class="form-group{{ $errors->has('open_time') ? ' has-error' : '' }}">
                            <label for="open_time" class="col-md-2 control-label">Operasional Jam Buka</label>
                            <div class="col-md-6">
                            <input id="open_time" type="text" class="form-control" name="open_time" placeholder="Masukkan Jam Buka" value="{{ old('open_time') }}" required autofocus>
                                @if ($errors->has('open_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('open_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       <div class="form-group{{ $errors->has('close_time') ? ' has-error' : '' }}">
                            <label for="close_time" class="col-md-2 control-label">Operasional Jam Tutup</label>
                            <div class="col-md-6">
                            <input id="close_time" type="text" class="form-control" name="close_time" placeholder="Masukkan Jam Tutup" value="{{ old('close_time') }}" required autofocus>
                                @if ($errors->has('close_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('close_time') }}</strong>
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
                      <label class="col-sm-2 control-label" for="gambar">gambar</label>
                      <div class="col-sm-8">
                       <input id="gambar" name="gambar" type="file">
                      </div>
                    </div>
  	              </div>
  	              <!-- /.box-body -->
  	              <div class="box-footer">
  	                <a href="{{ asset('sipar/wisata') }}" class="btn btn-default">Cancel</a>
  	                <button type="submit" class="btn btn-info pull-right">Save</button>
  	              </div>
  	              <!-- /.box-footer -->
  	            </form>
  	          </div>
  	    </div>
  	</div>
  @endif


  @if($act=="viewEditWisata")
    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Wisata</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form class="form-horizontal" enctype="multipart/form-data" action="{{ asset('sipar/wisata/proseseditwisata') }}" method="post">
                  {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="wisata_name" class="col-sm-2 control-label">Nama Wisata</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="wisata_name" name="wisata_name" value="{{ $wisata->wisata_name }}">
                        <input type="hidden" class="form-control" id="wisata_id" name="wisata_id" value="{{ $wisata->wisata_id }}">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="kecamatan_id" class="col-sm-2 control-label">Kecamatan</label>
                          <div class="col-sm-8">
                              <select class="form-control"  name="kecamatan_id" id="kecamatan_id" >
                                  @foreach($kec as $kcmtn)
                                      <option value="{{$kcmtn->kecamatan_id}}">{{$kcmtn->kecamatan_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="tiket_id" class="col-sm-2 control-label">Tiket</label>
                          <div class="col-sm-8">
                              <select class="form-control"  name="tiket_id" id="tiket_id" >
                                  @foreach($tiket as $tik)
                                      <option value="{{$tik->tiket_id}}">{{$tik->tiket_type}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="katwis_id" class="col-sm-2 control-label">Kategori Wisata</label>
                          <div class="col-sm-8">
                              <select class="form-control"  name="katwis_id" id="katwis_id" >
                                  @foreach($katwis as $wis)
                                      <option value="{{$wis->katwis_id}}">{{$wis->katwis_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="form-group">
                      <label for="harga" class="col-sm-2 control-label">harga wisata</label>
                      <div class="col-sm-8">
                     <input type="text" class="form-control" id="harga" name="harga" value="{{ $wisata->harga }}">
                    </div>
                  </div>
                     <div class="form-group">
                      <label for="wisata_alamat" class="col-sm-2 control-label">lokasi wisata</label>
                      <div class="col-sm-8">
                     <input type="text" class="form-control" id="wisata_alamat" name="wisata_alamat" value="{{ $wisata->wisata_alamat }}">
                    </div>
                  </div>
                    <div class="form-group">
                      <label for="open_time" class="col-sm-2 control-label">Jam Operasional Buka </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="open_time" name="open_time" value="{{ $wisata->open_time }}">
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="col-sm-2 control-label" for="close_time">Jam Operasional Tutup</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="close_time" name="close_time" value="{{ $wisata->close_time }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="longitude">Longitude</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $wisata->longitude }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="latitude">Latitude</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $wisata->latitude }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="gambar">gambar</label>
                      <div class="col-sm-8">
                       <input id="gambar" name="gambar" type="file" value="{{ $wisata->gambar }}">
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <a href="{{ asset('sipar/wisata') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Edit</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
        </div>
    </div>
  @endif

@if($act=="viewDetailWisata")
    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Detail Data Wisata</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form class="form-horizontal" action="#" method="post">
                  {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="wisata_name" class="col-sm-2 control-label">Nama Wisata</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="wisata_name" name="wisata_name" value="{{ $wisata->wisata_name }}">
                        <input type="hidden" class="form-control" id="wisata_name" name="wisata_name" value="{{ $wisata->wisata_name }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="kecamatan_name" class="col-sm-2 control-label">Kecamatan</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="kecamatan_name" name="kecamatan_name" value="{{ $kec->kecamatan_name }}">
                        <input type="hidden" class="form-control" id="kecamatan_name" name="kecamatan_name" value="{{ $kec->kecamatan_name }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tiket_type" class="col-sm-2 control-label">Tiket Wisata</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="tiket_type" name="tiket_type" value="{{ $tiket->tiket_type }}">
                        <input type="hidden" class="form-control" id="tiket_type" name="tiket_type" value="{{ $tiket->tiket_type }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="katwis_name" class="col-sm-2 control-label">Kategori Wisata</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="katwis_name" name="type" value="{{ $katwis->katwis_name }}">
                        <input type="hidden" class="form-control" id="katwis_name" name="type" value="{{ $katwis->katwis_name }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="harga" class="col-sm-2 control-label">Harga Tiket</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="harga" name="harga" value="{{ $wisata->harga }}">
                        <input type="hidden" class="form-control" d="harga" name="harga" value="{{ $wisata->harga }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="wisata_alamat" class="col-sm-2 control-label">Lokasi</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="wisata_alamat" name="wisata_alamat" value="{{ $wisata->wisata_alamat }}">
                        <input type="hidden" class="form-control" id="wisata_alamat" name="wisata_alamat" value="{{ $wisata->wisata_alamat }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="open_time" class="col-sm-2 control-label">Operasional Jam Buka</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="open_time" name="open_time" value="{{ $wisata->open_time }}">
                        <input type="hidden" class="form-control" id="open_time" name="open_time" value="{{ $wisata->open_time }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="close_time" class="col-sm-2 control-label">Operasional Jam Tutup</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="close_time" name="close_time" value="{{ $wisata->close_time }}">
                        <input type="hidden" class="form-control" id="close_time" name="close_time" value="{{ $wisata->close_time }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="longitude" class="col-sm-2 control-label">Longitude</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="longitude" name="longitude" value="{{ $wisata->longitude }}">
                        <input type="hidden" class="form-control" id="longitude" name="longitude" value="{{ $wisata->longitude }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="latitude" class="col-sm-2 control-label">Latitude</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="latitude" name="latitude" value="{{ $wisata->latitude }}">
                        <input type="hidden" class="form-control" id="latitude" name="latitude" value="{{ $wisata->latitude }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="gambar_barang" class="col-sm-2 control-label">Gambar</label>
                      <div class="col-sm-8">
                          <img id="myImg" src="{{ asset ($wisata->gambar) }}" alt="gambar.jpg" style="width:100%;max-width:300px">
                          
                         
                         
                          <!-- The Modal -->
                          <div id="myModal" class="modal">

                            <!-- The Close Button -->
                            <span class="close">&times;</span>

                            <!-- Modal Content (The Image) -->
                            <img class="modal-content" id="img01">

                            <!-- Modal Caption (Image Text) -->
                            <div id="caption"></div>
                          </div> 
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <a href="{{ asset('/sipar/wisata') }}" class="btn btn-default">Back</a>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
        </div>
    </div>
  @endif
  
  @if($act=="viewWisata" || $act=="viewDeleteWisata")

  
    @if (isset($msg))
      <?php  echo viewMessage($msg); ?>
    @endif

    @if ($act=="viewDeleteWisata")

        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Info!</h4>
          Hapus Wisata <strong> {{ $wisata_del->wisata_name }} </strong> ?
            <a href="{{ asset('sipar/wisata') }}" class="btn-sm btn-primary">Cancel</a>
            <a href="{{ url('sipar/wisata/prosesdeletewisata',$wisata_del->wisata_id) }}" class="btn-sm btn-danger">Hapus</a>
        </div>


    @endif



  	<div class="row">
  	<div class="col-md-12">
  		<div class="box box-info">
  	            <div class="box-header with-border">
  	              <h3 class="box-title pull-center">Data Wisata</h3>
                  @if (auth::user()->jabatan == 'ADMIN')
                  <a href="{{ asset('sipar/wisata/viewtambahwisata') }}" class="btn btn-info pull-right">Tambah</a>
                  @elseif (auth::user()->jabatan == 'PIMPINAN')
                  <a href="{{ asset('sipar/wisata/cetak_pdf') }}" class="btn btn-info pull-right">CETAK PDF</a>
                  @elseif (auth::user()->jabatan == 'PETUGAS')
                  <a href="{{ asset('sipar/wisata/viewtambahwisata') }}" class="btn btn-info pull-right">Tambah</a>
                  @endif
                  
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
                      @if (auth::user()->jabatan == 'ADMIN')
                      <td>
                        <a href="{{ url('sipar/wisata/viewDetailWisata',$m->wisata_id) }}" class="btn-sm btn-primary "><i class="fa fa-info-circle"></i></a> <br><br>
                        <a href="{{ url('sipar/wisata/vieweditwisata',$m->wisata_id) }}" class="btn-sm btn-warning "><i class="fa fa-edit"></i></a> <br><br>
                        <a href="{{ url('sipar/wisata/viewdeletewisata',$m->wisata_id) }}" class="btn-sm btn-danger "><i class="fa fa-trash"></i></a><br><br> 
                      </td>
                      @elseif (auth::user()->jabatan == 'PIMPINAN')
                      <td>
                         <a href="{{ url('sipar/wisata/viewDetailWisata',$m->wisata_id) }}" class="btn-sm btn-primary "><i class="fa fa-info-circle"></i></a> <br><br>
                      </td>
                      @elseif (auth::user()->jabatan == 'PETUGAS')
                      <td>
                      <a href="{{ url('sipar/wisata/vieweditwisata',$m->wisata_id) }}" class="btn-sm btn-warning "><i class="fa fa-edit"></i></a> <br><br>
                    </td>
                      @endif
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

  @if($act=="viewPetaWisata")

        <div class="row">
          <div class="col-md-4">
            <div class="box box-info">

                <table class="table table-striped">
                  <tr>
                    <td class="col-sm-3">Wisata</td>
                    <td>: {{ $wisata->wisata_name }}</td>
                  </tr>
                  <tr>
                    <td class="col-sm-3">Kecamatan</td>
                    <td>: {{ $kec->kecamatan_name }}</td>
                  </tr>
                  <tr>
                    <td class="col-sm-3">Alamat</td>
                    <td>: {{ $wisata->wisata_alamat }}</td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="col-md-8">
            <div class="box box-info">
                <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q={{ $wisata->latitude }},{{ $wisata->longitude }}&amp;key=AIzaSyBBbL8XuzggHZSgTu22E3gup27VDoUlWm4"></iframe>

              </div>
            </div>
          </div>
        </div>
@endif

@endsection