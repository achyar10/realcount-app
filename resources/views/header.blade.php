<div class="mainmenu__row wrapper">
    <div class="mainmenu__logotitle-wrap">
        <div class="mainmenu__logo">
            <div class="burger">
                <img src="{{ asset('frontend/img/burger.png') }}" alt="menuburger">
            </div>
            <a href="/"><img class="logonya" src="{{ asset('assets/images/logo.png') }}" alt="logo"
                    height="120px"></a>
        </div>

        <!-- Share -->
        <div id="share-url" data-url="https://waringinjaya.id" data-text="Situs Resmi Desa Waringin Jaya"
            data-img="{{ asset('assets/images/logo.png') }}" data-title="Situs Resmi Desa Waringin Jaya"
            style="display:none;"></div>


        <div class="mainmenu__sitetitle row ">
            <div class="mainmenu__sitetitle-top">
                <span class="ml-3">SITUS RESMI</span>
            </div>

            <div class="mainmenu__sitetitle-bottom ">
                <span class="bold text-uppercase ml-3">DESA WARINGIN JAYA</span>
            </div>

            <div class="p-0 d-only">
                <div class="col-sm-12">
                    <div class="font-size-11" style="text-align: right;"> <i class="fa fa-calendar"></i>
                        <script language='JavaScript'>
                            document.write(tanggallengkap);
                        </script>
                    </div>
                </div>
            </div>
            <div class="p-0 m-only">
                <div class="col-sm-12">
                    <div class="font-size-8" style="text-align: left;"> <i class="fa fa-calendar"></i>
                        <script language='JavaScript'>
                            document.write(tanggallengkap);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- menu  -->
    <div class="mainmenu__nav">
        <nav class="menu">
            <ul class="">
                <input type="hidden" value="1" name="menu_id">
                <li><a target="_parent" href="/"> Home </a></li>
                <input type="hidden" value="2" name="menu_id">
                <li class="has-dropdown">
                    <a><i class=""></i>Profil <i class="fas fa-caret-down"></i></a>
                    <ul>
                        <li><a target="_parent" href="halaman/detail/visi-dan-misi.html"><i
                                    class="mdi mdi-library-books"></i> Visi dan Misi </a></li>


                        <li><a target="_parent" href="halaman/detail/struktur-organisasi.html"><i
                                    class="fa fa-users"></i> Struktur Organisasi </a></li>


                        <li><a target="_parent" href="halaman/detail/tugas-pokok-dan-fungsi.html"><i
                                    class="mdi mdi-buffer"></i> Tugas Pokok dan Fungsi </a></li>


                        <li><a target="_parent" href="pegawai.html"><i class="mdi mdi-account-card-details"></i> Data
                                Pegawai </a></li>


                    </ul>
                </li>
                <input type="hidden" value="3" name="menu_id">
                <li><a target="_parent" href="berita.html"> <i class=""></i> Berita </a></li>
                <input type="hidden" value="6" name="menu_id">
                <li class="has-dropdown">
                    <a><i class=""></i>Informasi <i class="fas fa-caret-down"></i></a>
                    <ul>
                        <li><a target="_parent" href="layanan.html"><i class="mdi mdi-teach"></i> Layanan </a>
                        </li>


                        <li><a target="_parent" href="pengumuman.html"><i class="mdi mdi-bullhorn"></i>
                                Pengumuman </a></li>


                        <li><a target="_parent" href="agenda.html"><i class="mdi mdi-timetable"></i> Agenda
                            </a></li>


                        <li><a target="_parent" href="bankdata.html"><i class="mdi mdi-database"></i> Bank
                                Data </a></li>


                    </ul>
                </li>
                <input type="hidden" value="5" name="menu_id">
                <li class="has-dropdown">
                    <a><i class=""></i>Galeri <i class="fas fa-caret-down"></i></a>
                    <ul>
                        <li><a target="_parent" href="foto.html"><i class="mdi mdi-camera"></i> Foto </a></li>


                        <li><a target="_parent" href="video.html"><i class="mdi mdi-video"></i> Video </a>
                        </li>


                    </ul>
                </li>
                <li><a target="_parent" href="infografis.html"> <i class=""></i> Infografis </a></li>
                <li><a target="_parent" href="kritiksaran/suaraanda.html"> <i class="fas fa-comments"></i>
                        Suara Anda </a></li>
                <li class="mt-3 p-0">
                    <div class="btn btn-light btn-sm text-uppercase text-black-50 ml-3 tambahkritik"><b>Kritik
                            Saran</b></div>
                </li>
            </ul>
        </nav>
        <div class="caribahasa">
        </div>
    </div>
</div>
