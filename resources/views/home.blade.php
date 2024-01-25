@extends('layouts')
@section('title', 'Home')
@section('content')

    <div class="wrapper">

        <div class="mainwrap">
            <!-- maincontent / -->

            <main class="maincontent">
                <!-- LATEST KANAL BERITA  -->
                <div class="latestnews hlm-section">

                    <div class="hlm-title">
                        <span class="hlm-title-blueborder">
                            <span class="strong">Berita</span>
                            <span>Terbaru</span>
                        </span>
                    </div>

                    <div class="newsrow">
                    </div>

                </div>

            </main>

            <!-- sidebar  -->
            @include('sidebar')
        </div><!-- mainwrap-->

        <div class="wrapper section-galeri">
            <div class="fotovideo hlm-section">
                <div class="hlm-title">
                    <span class="hlm-title-blueborder">
                        <span class="strong">Galeri</span>
                        <span>Foto</span>
                    </span>
                </div>
                {{-- <div class="fotoslider-wrap">
                      <div class="swiper-container-foto">
                          <div class="swiper-wrapper">
                              <div class="swiper-slide">
                                  <div class="newsthumb fotohumb">
                                      <div class="newsthumb__img pointer">
                                          <a onclick="lihatfoto('57','Kegiatan')"><img
                                                  src="public/img/galeri/foto/thumb/thumb_1623816679_7fb1cfd80ab799fdafe9.png.jpeg"
                                                  alt="img" title="Demo Foto 2"></a>
                                      </div>
                                      <div class="newsthumb__content">
                                          <div class="catedate">
                                              <a class="cate">Kegiatan</a>
                                              <span class="date">Rabu, 16 Juni 2021</span>
                                          </div>

                                      </div>
                                  </div>
                              </div>
                              <div class="swiper-slide">
                                  <div class="newsthumb fotohumb">
                                      <div class="newsthumb__img pointer">
                                          <a onclick="lihatfoto('56','Kegiatan')"><img
                                                  src="public/img/galeri/foto/thumb/thumb_1623816645_2f46dd8c92fa8762b82b.jpg"
                                                  alt="img" title="Demo Foto 2"></a>
                                      </div>
                                      <div class="newsthumb__content">
                                          <div class="catedate">
                                              <a class="cate">Kegiatan</a>
                                              <span class="date">Rabu, 16 Juni 2021</span>
                                          </div>

                                      </div>
                                  </div>
                              </div>
                              <div class="swiper-slide">
                                  <div class="newsthumb fotohumb">
                                      <div class="newsthumb__img pointer">
                                          <a onclick="lihatfoto('55','Kegiatan')"><img
                                                  src="public/img/galeri/foto/thumb/thumb_1623816616_617b8a6312b617eb473a.jpg"
                                                  alt="img" title="Demo Foto"></a>
                                      </div>
                                      <div class="newsthumb__content">
                                          <div class="catedate">
                                              <a class="cate">Kegiatan</a>
                                              <span class="date">Rabu, 16 Juni 2021</span>
                                          </div>

                                      </div>
                                  </div>
                              </div>
                              <div class="swiper-slide">
                                  <div class="newsthumb fotohumb">
                                      <div class="newsthumb__img pointer">
                                          <a onclick="lihatfoto('54','Kegiatan')"><img
                                                  src="public/img/galeri/foto/thumb/thumb_1623816602_55ee2fdfa393b58e7b26.jpg"
                                                  alt="img" title="Kegiatan"></a>
                                      </div>
                                      <div class="newsthumb__content">
                                          <div class="catedate">
                                              <a class="cate">Kegiatan</a>
                                              <span class="date">Rabu, 16 Juni 2021</span>
                                          </div>

                                      </div>
                                  </div>
                              </div>
                              <div class="swiper-slide">
                                  <div class="newsthumb fotohumb">
                                      <div class="newsthumb__img pointer">
                                          <a onclick="lihatfoto('53','Kegiatan')"><img
                                                  src="public/img/galeri/foto/thumb/thumb_1623816543_2a2a3f10d9e4cc0e664d.jpg"
                                                  alt="img" title="Demo Foto 2"></a>
                                      </div>
                                      <div class="newsthumb__content">
                                          <div class="catedate">
                                              <a class="cate">Kegiatan</a>
                                              <span class="date">Rabu, 16 Juni 2021</span>
                                          </div>

                                      </div>
                                  </div>
                              </div>
                              <div class="swiper-slide">
                                  <div class="newsthumb fotohumb">
                                      <div class="newsthumb__img pointer">
                                          <a onclick="lihatfoto('52','Bidang Pembangunan')"><img
                                                  src="public/img/galeri/foto/thumb/thumb_1623816515_25de364958d48be7a6ad.jpg"
                                                  alt="img" title="Demo Foto 2"></a>
                                      </div>
                                      <div class="newsthumb__content">
                                          <div class="catedate">
                                              <a class="cate">Bidang Pembangunan</a>
                                              <span class="date">Rabu, 16 Juni 2021</span>
                                          </div>

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div> --}}
            </div>
        </div>
        <!-- end homebottom  -->

    </div>

@endsection
