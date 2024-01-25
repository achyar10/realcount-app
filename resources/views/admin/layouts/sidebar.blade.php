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
                <li class="menu-title" key="t-managements">Master Data</li>

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
        </div>
        <!-- Sidebar -->
    </div>
</div>
