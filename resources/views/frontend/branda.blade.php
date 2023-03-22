@extends('layouts.app')
@section('title', 'Branda')

@section('additional-css')

@endsection

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h3 class="section-title">Sistem Informasi Data Keolahragaan</h3>
                <p class="orpres-text-description">DISPORA KABUPATEN BANDUNG</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-4 text-center text-white">
                    <h1>{{$jmlFasilitasOlahraga}}</h1>
                    <p>Fasilitas Olahraga</p>
                </div>
                <div class="col-lg-4 col-md-4 text-center text-white">
                    <h1>{{$jmlKelompokOlahraga}}</h1>
                    <p>Kegiatan Olahraga di Masyarakat</p>
                </div>
                <div class="col-lg-4 col-md-4 text-center text-white">
                    <h1>{{$jmlPotensiAtlet}}</h1>
                    <p>Potensi Atlet</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12" data-aos="zoom-in">
                    <div class="box">
                        <h4 class="title"><a href="{{url('/fasilitas-olahraga')}}">Fasilitas Olahraga</a></h4>
                        <p class="orpres-text-description">Berisi data - data fasilitas keolahragaan yang meliputi sarana dan prasarana yang ada di wilayah Kabupaten Bandung </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12" data-aos="zoom-in">
                    <div class="box">
                        <h4 class="title"><a href="{{url('/potensi-olahraga')}}">Potensi Olahraga</a></h4>
                        <p class="orpres-text-description">Bersisi data - data potensi keolahragaan yang meliputi kelompok olahraga dan data potensi atlet yang ada di wilayah Kabupaten Bandung</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection