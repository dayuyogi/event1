@extends('template.admin')

@section('title')
 Event - SI Wisata
@endsection


@section('judulmenu')
  Master Data Event
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

  @if($act=="viewTambahevent")
    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah event</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" enctype="multipart/form-data" action="{{ asset('sipar/event/prosestambahevent') }}" method="post">
                  {!! csrf_field() !!}
                  <div class="box-body">
                     <div class="form-group{{ $errors->has('event_name') ? ' has-error' : '' }}">
                            <label for="event_name" class="col-md-2 control-label">Nama Event</label>
                            <div class="col-md-6">
                            <input id="event_name" type="text" class="form-control" name="event_name" placeholder="Masukkan Nama Event" value="{{ old('event_name') }}" required autofocus>
                                @if ($errors->has('event_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('event_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                      </div>
                      <div class="form-group">
                        <label for="kateven_name" class="col-sm-2 control-label">Kategori Event</label>
                          <div class="col-sm-6">
                              <select class="form-control"  name="kateven_id" id="kateven_id" >
                                  @foreach($kateven as $kategorieven)
                                      <option value="{{$kategorieven->kateven_id}}">{{$kategorieven->kateven_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="form-group">
                        <label for="wisata_name" class="col-sm-2 control-label">Lokasi Event</label>
                          <div class="col-sm-6">
                              <select class="form-control"  name="wisata_id" id="wisata_id" >
                                  @foreach($wisata as $wst)
                                      <option value="{{$wst->wisata_id}}">{{$wst->wisata_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                   <div class="form-group{{ $errors->has('penyelenggara') ? ' has-error' : '' }}">
                            <label for="penyelenggara" class="col-md-2 control-label">Penyelenggara</label>
                            <div class="col-md-6">
                            <input id="penyelenggara" type="text" class="form-control" name="penyelenggara" placeholder="Masukkan Nama Penyelenggara" value="{{ old('penyelenggara') }}" required autofocus>
                                @if ($errors->has('penyelenggara'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('penyelenggara') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                     <div class="form-group{{ $errors->has('contact_person') ? ' has-error' : '' }}">
                            <label for="contact_person" class="col-md-2 control-label">Contact Person</label>
                            <div class="col-md-6">
                            <input id="contact_person" type="text" class="form-control" name="contact_person" placeholder="Masukkan Contact Person" value="{{ old('contact_person') }}" required autofocus>
                                @if ($errors->has('contact_person'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_person') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                      <div class="form-group">
                      <label class="col-sm-2 control-label" for="tgl_mulai">Tanggal Mulai Event</label>
                      <div class="col-sm-6">
                       <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="peserta_bukti">Tanggal Selesai</label>
                      <div class="col-sm-6">
                       <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai">
                      </div>
                    </div>
                  <div class="form-group{{ $errors->has('open_time') ? ' has-error' : '' }}">
                            <label for="open_time" class="col-md-2 control-label">Jam Buka Event</label>
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
                            <label for="close_time" class="col-md-2 control-label">Jam Tutup Event</label>
                            <div class="col-md-6">
                            <input id="close_time" type="text" class="form-control" name="close_time" placeholder="Masukkan Jam Tutup" value="{{ old('close_time') }}" required autofocus>
                                @if ($errors->has('close_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('close_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                      </div>
                     <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                            <label for="ket" class="col-md-2 control-label">Keterangan</label>
                            <div class="col-md-6">
                            <input id="ket" type="text" class="form-control" name="ket" placeholder="Tambahkan Keterangan" value="{{ old('ket') }}" required autofocus>
                                @if ($errors->has('ket'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ket') }}</strong>
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
                    <a href="{{ asset('sipar/event') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
        </div>
    </div>
  @endif


  @if($act=="viewEditevent")
    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit event</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form class="form-horizontal" enctype="multipart/form-data" action="{{ asset('sipar/event/proseseditevent') }}" method="post">
                  {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="event_name" class="col-sm-2 control-label">Nama event</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="event_name" name="event_name" value="{{ $event->event_name }}">
                        <input type="hidden" class="form-control" id="event_id" name="event_id" value="{{ $event->event_id }}">
                      </div>
                    </div>
                     <div class="form-group">
                        <label for="kateven_name" class="col-sm-2 control-label">Kategori Event</label>
                          <div class="col-sm-8">
                              <select class="form-control"  name="kateven_id" id="kateven_id" >
                                  @foreach($kateven as $kategorieven)
                                      <option value="{{$kategorieven->kateven_id}}">{{$kategorieven->kateven_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                     <div class="form-group">
                        <label for="wisata_name" class="col-sm-2 control-label">Lokasi Event</label>
                          <div class="col-sm-8">
                              <select class="form-control"  name="wisata_id" id="wisata_id" >
                                  @foreach($wisata as $wst)
                                      <option value="{{$wst->wisata_id}}">{{$wst->wisata_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="form-group">
                      <label for="penyelenggara" class="col-sm-2 control-label">penyelenggara </label>
                      <div class="col-sm-8">
                       <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" value="{{ $event->penyelenggara }}" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="contact_person" class="col-sm-2 control-label">contact person</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{ $event->contact_person }}">
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="col-sm-2 control-label" for="tgl_mulai">tanggal mulai</label>
                      <div class="col-sm-8">
                       <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" value="{{ $event->tgl_mulai }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="tgl_selesai">tanggal selesai</label>
                      <div class="col-sm-8">
                       <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" value="{{ $event->tgl_selesai }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="open_time">open time</label>
                      <div class="col-sm-8">
                       <input type="text" class="form-control" id="open_time" name="open_time" value="{{ $event->open_time }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="close_time">close time</label>
                      <div class="col-sm-8">
                       <input type="text" class="form-control" id="close_time" name="close_time" value="{{ $event->close_time }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="ket">ket</label>
                      <div class="col-sm-8">
                       <input type="text" class="form-control" id="ket" name="ket" value="{{ $event->ket }}">
                      </div>  
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="gambar">gambar</label>
                      <div class="col-sm-8">
                       <input id="gambar" name="gambar" type="file" value="{{ $event->gambar }}">
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <a href="{{ asset('sipar/event') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-info pull-right">Edit</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
        </div>
    </div>
  @endif

@if($act=="viewDetailEvent")
    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Detail Data Event</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <form class="form-horizontal" action="#" method="post">
                  {!! csrf_field() !!}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="event_name" class="col-sm-2 control-label">Nama Event</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="event_name" name="event_name" value="{{ $event->event_name }}">
                        <input type="hidden" class="form-control" id="event_name" name="event_name" value="{{ $event->event_name }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="kateven_name" class="col-sm-2 control-label">Kategori Event</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="kateven_name" name="kateven_name" value="{{ $kateven->kateven_name }}">
                        <input type="hidden" class="form-control" id="kateven_name" name="kateven_name" value="{{ $kateven->kateven_name }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="wisata_name" class="col-sm-2 control-label">Lokasi Event</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="wisata_name" name="wisata_name" value="{{ $wisata->wisata_name }}">
                        <input type="hidden" class="form-control" id="wisata_name" name="wisata_name" value="{{ $wisata->wisata_name }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="penyelenggara" class="col-sm-2 control-label">Penyelenggara</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="penyelenggara" name="penyelenggara" value="{{ $event->penyelenggara }}">
                        <input type="hidden" class="form-control" id="penyelenggara" name="penyelenggara" value="{{ $event->penyelenggara }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="contact_person" class="col-sm-2 control-label">Contact Person</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="contact_person" name="contact_person" value="{{ $event->contact_person }}">
                        <input type="hidden" class="form-control" id="contact_person" name="contact_person" value="{{ $event->contact_person }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tgl_mulai" class="col-sm-2 control-label">Tanggal Mulai</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="tgl_mulai" name="tgl_mulai" value="{{ $event->tgl_mulai }}">
                        <input type="hidden" class="form-control" id="tgl_mulai" name="tgl_mulai" value="{{ $event->tgl_mulai }}">
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="tgl_selesai" class="col-sm-2 control-label">Tanggal Selesai</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="tgl_selesai" name="tgl_selesai" value="{{ $event->tgl_selesai }}">
                        <input type="hidden" class="form-control" id="tgl_selesai" name="tgl_selesai" value="{{ $event->tgl_selesai }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="open_time" class="col-sm-2 control-label">Operasional Jam Buka</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="open_time" name="open_time" value="{{ $event->open_time }}">
                        <input type="hidden" class="form-control" id="open_time" name="open_time" value="{{ $event->open_time }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="close_time" class="col-sm-2 control-label">Operasional Jam Tutup</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="close_time" name="close_time" value="{{ $event->close_time }}">
                        <input type="hidden" class="form-control" id="close_time" name="close_time" value="{{ $event->close_time }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="ket" class="col-sm-2 control-label">Keterangan</label>
                      <div class="col-sm-8">
                        <input disabled="" type="text" class="form-control" id="ket" name="ket" value="{{ $event->ket }}">
                        <input type="hidden" class="form-control" id="ket" name="ket" value="{{ $event->ket }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="gambar_barang" class="col-sm-2 control-label">Gambar</label>
                      <div class="col-sm-8">
                          <img id="myImg" src="{{ asset ($event->gambar) }}" alt="gambar.jpg" style="width:100%;max-width:300px">
                          
                         
                         
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
                    <a href="{{ asset('/sipar/event') }}" class="btn btn-default">Back</a>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
        </div>
    </div>
  @endif

  @if($act=="viewevent" || $act=="viewDeleteevent")

  
    @if (isset($msg))
      <?php  echo viewMessage($msg); ?>
    @endif

    @if ($act=="viewDeleteevent")

        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Info!</h4>
          Hapus Event <strong> {{ $event_del->event_name }} </strong> ?
            <a href="{{ asset('sipar/event') }}" class="btn-sm btn-primary">Cancel</a>
            <a href="{{ url('sipar/event/prosesdeleteevent',$event_del->event_id) }}" class="btn-sm btn-danger">Hapus</a>
        </div>

    @endif

    <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Data event</h3>
                  <a href="{{ asset('sipar/event/viewtambahevent') }}" class="btn btn-info pull-right">Tambah</a>
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
                    <th>Nama Event</th>
                    <th>Lokasi Event </th>
                    <th>Penyelenggara Event</th>
                    <th>Contact Person</th>
                    <th>Ket</th>
                    <th>Gambar</th>
                    <th>Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $i = 1;
                    @endphp

                  @foreach ($event as $m)
                     <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $m->event_name }}</td>
                      <td>{{ $m->obj}}</td>
                      <td>{{ $m->penyelenggara }}</td>
                      <td>{{ $m->contact_person }}</td>
                      <td>{{ $m->ket }}</td>
                      <td><img id="myImg" src="{{ asset ($m->gambar) }}" alt="gambar.jpg" style="width:50%;max-width:100px"></td>
                      <td>
                        <a href="{{ url('sipar/event/viewDetailEvent',$m->wisata_id) }}" class="btn-sm btn-primary "><i class="fa fa-info-circle"></i></a> <br><br>
                        <a href="{{ url('sipar/event/vieweditevent',$m->event_id) }}" class="btn-sm btn-warning "><i class="fa fa-edit"></i></a> <br><br>
                        <a href="{{ url('sipar/event/viewdeleteevent',$m->event_id) }}" class="btn-sm btn-danger "><i class="fa fa-trash"></i></a>   
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