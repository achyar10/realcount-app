<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>

            </ul>
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-managements">Perhitungan Suara</li>
                <li>
                    <a href="{{ route('vote') }}" class="waves-effect">
                        <i class="bx bx-user-voice"></i>
                        <span key="t-uvoice">Penginputan Suara</span>
                    </a>
                </li>
            </ul>
            @if (auth()->user()->role == 'superadmin')
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" key="t-managements">Master Data</li>
                    <li>
                        <a href="{{ route('candidate') }}" class="waves-effect">
                            <i class="bx bx-user-pin"></i>
                            <span key="t-upin">Kandidat</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tps') }}" class="waves-effect">
                            <i class="bx bx-home"></i>
                            <span key="t-home">Kelola TPS</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('district') }}" class="waves-effect">
                            <i class="bx bx-map"></i>
                            <span key="t-map">Kelola Wilayah Pemilihan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users') }}" class="waves-effect">
                            <i class="bx bx-user"></i>
                            <span key="t-users">Kelola Pengguna</span>
                        </a>
                    </li>
                </ul>
            @endif
        </div>
        <!-- Sidebar -->
    </div>
</div>
