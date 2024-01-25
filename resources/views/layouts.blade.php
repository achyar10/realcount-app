  <!doctype html>
  <html lang="in">

  <head>
      <!-- SITE TITLE -->
      <meta name="description"
          content="Organisasi Perangkat Daerah dalam Pemerintah Indonesia yang membidangi urusan pemuda olahraga dan Kabudayaan Kabupaten Lembata">
      <!-- Favicon Icon -->
      <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
      <title>Website Resmi {{ config('setting.name') }}</title>
      <!-- Meta -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- css_main -->
      <link href="{{ asset('frontend/css/app.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('frontend/css/add.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
      <!-- css_plugin -->
      <link href="{{ asset('frontend/plugins/swiperjs/swiper.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('frontend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
      <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
      <!-- Galeri Image css -->
      <link href="{{ asset('frontend/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" />

      <style>
          .pointer {
              cursor: pointer;
          }

      </style>

  </head>

  <body>
      <!-- main menu  -->
      <div class="mainmenu">

          <script language="JavaScript">
              var tanggallengkap = new String();
              var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
              namahari = namahari.split(" ");
              var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
              namabulan = namabulan.split(" ");
              var tgl = new Date();
              var hari = tgl.getDay();
              var tanggal = tgl.getDate();
              var bulan = tgl.getMonth();
              var tahun = tgl.getFullYear();
              tanggallengkap = namahari[hari] + ", " + tanggal + " " + namabulan[bulan] + " " + tahun;
          </script>

          @include('header')

      </div>
      <!-- end main menu -->
      <div class="header-spacer"></div>
      <div class="xswiper-topicon-wrap wrapper">
          <!-- full slider xswiper -->
          <div class=" xswiper xswiper-topbanner">
              <div class="xswiper-outer">
                  <!-- Swiper -->
                  <div class="swiper-containerx">
                      @foreach (config('banner') as $row)
                          <div class="swiper-wrapper">
                              <div class="swiper-slide">
                                  <div class="xslide">
                                      <div class="xslide-img">
                                          <img class="d-only" style="height: 200px"
                                              src="{{ asset("banner/$row->image") }}" alt="{{ $row->name }}">
                                          <img class="m-only mt-2" style="height: 200px"
                                              src="{{ asset("banner/$row->image") }}" alt="{{ $row->name }}">
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @endforeach
                      <!-- Add Arrows -->
                      <div class="swiper-button-next swiper-button-custom"></div>
                      <div class="swiper-button-prev swiper-button-custom"></div>
                  </div>
              </div>
          </div>
      </div>
      <!-- content -->
      @yield('content')

      <div class="modal fade in" tabindex="-1" role="dialog" id="modalViewsambutan">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-body">
                      <div class="card-body p-0">
                          <p style="text-align:justify; "><img
                                  src="{{ asset('post/' . config('setting.pic_photo')) }}"
                                  style="float:left; padding: 8px;" height="180" />
                          <p class="MsoNormal">Sambutan Kepala Desa</p></p>
                      </div>
                      <div class="modal-footer p-0">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="viewdata"></div>
      <div class="viewmodal"></div>


      <div class="wrapper">
          <div class="mindex-wrap">
              <div class="hlm-title">
                  <span class="hlm-title-blueborder">
                      <span class="strong">LINK </span>
                      <span>TERKAIT</span>
                  </span>
              </div>
              {{-- <div class="mindex-slider">
                  <div class="fotoslider-wrap">
                      <div class="swiper-container-mindex">
                          <div class="swiper-wrapper">
                              <div class="swiper-slide">
                                  <a class="mindex-link" href="https://www.kominfo.go.id/" target="_blank">
                                      <div class="mindex__icon"><img
                                              src="public/img/linkterkait/1624851972_da31dfea25f48c80a51d.png"
                                              alt="mindex"></div>
                                      <div class="mindex__title">Kementerian Komunikasi dan Informatika</div>
                                  </a>
                              </div>
                              <div class="swiper-slide">
                                  <a class="mindex-link" href="https://lapor.go.id" target="_blank">
                                      <div class="mindex__icon"><img
                                              src="public/img/linkterkait/1627908745_ab42917c19d79ffc3537.png"
                                              alt="mindex"></div>
                                      <div class="mindex__title">LAPOR.GO.ID</div>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div> --}}
          </div>
      </div>

      <!-- footer  -->
      @include('footer')
      <!-- ============================= back-to-top ============================= -->
      <a id="back-to-top" href="#" class="back-to-top" role="button">
          <span class="fa fa-arrow-up" aria-hidden="true"></span>
      </a>
      <!-- ============================= end-back-to-top ============================= -->
  </body>
  <div class="viewdata"></div>
  <div class="viewmodal"></div>

  <script>
      $(function() {

          var url = window.location.pathname,
              urlRegExp = new RegExp(url.replace(/\/$/) +
                  "$"
              ); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there
          // now grab every link from the navigation
          $('.menu a').each(function() {
              // and test its normalized href against the url pathname regexp
              if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
                  $(this).addClass('active');
              }
          });

      });
  </script>


  <!-- js_plugins -->
  <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/plugins/swiperjs/swiper.min.js') }}"></script>
  <!-- js_main-->
  <script src="{{ asset('frontend/js/main.js') }}"></script>
  <script src="{{ asset('frontend/js/custom.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Datatable init js -->
  <script src="{{ asset('frontend/js/datatables.init.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('frontend/js/dataTables.bootstrap4.min.js') }}"></script>
  <!-- Galeri Magnific Popup-->
  <script src="{{ asset('frontend/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('frontend/js/gallery.init.js') }}"></script>

  </html>
