@extends('template.admin')

@section('title')
    HALAMAN UTAMA 
@endsection

@section('header')
    <style type="text/css">
        .thumb {
            position: relative;
            width: 100%;
            height: 300px;
            overflow: hidden;
        }
        .thumb img {
            position: absolute;
            left: 50%;
            border-radius: 0px;
            top: 50%;
            -webkit-transform: translate(-50%,-50%);
            -ms-transform: translate(-50%,-50%);
            transform: translate(-50%,-50%);
        }
    </style>
@stop
@section('maincontent')
    
   {{--  <section class="content-header">
        <h1>
            Dashboard
            <small>Halaman Utama Sistem</small>
        </h1>
    </section> --}}

    <section class="content">

        <div class="callout callout-success">
            <h4>Selamat Datang</h4>
            <p>Selamat Datang di Sistem Informasi Geografis Pariwisata <b>Kabupaten Badung</b>.</p>
        </div>


        <div class="row">

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-maroon">
                    <div class="inner">
                        <h3>{{ $jml_wisata }}</h3>
                        <p>Wisata</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-folder"></i>
                    </div>
                    <a href="{{ url('sipar/wisata') }}" class="small-box-footer">Kunjungi Halaman <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>{{ $jml_event }}</h3>
                        <p>Event</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                    <a href="{{ url('sipar/event') }}" class="small-box-footer">Kunjungi Halaman <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>


            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3>{{ $jml_news }}</h3>
                        <p>Berita</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-laptop"></i>
                    </div>
                    <a href="{{ url('sipar/news') }}" class="small-box-footer">Kunjungi Halaman <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>

    </section>

@stop