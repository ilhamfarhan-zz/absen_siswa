<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link center">
        <span class="brand-text font-weight-light">Absen Siswa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @if (auth()->user()->level == "siswa")
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>
                            Absen
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('presensi-index') }}" class="nav-link ">
                                <i class="fas fa-sign-in-alt"></i>
                                <p>Absen Masuk</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (auth()->user()->level == "admin")
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>
                            Data Absen
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('presensis.index') }}" class="nav-link ">
                                <i class="fas fa-sign-in-alt"></i>
                                <p>Data Absen siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('buktis.index') }}" class="nav-link">
                                <i class="fas fa-sign-in-alt"></i>
                                <p>Data Bukti siswa</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- data siswa -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>
                            Data Siswa
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('rombels.index') }}" class="nav-link ">
                                <i class="fas fa-sign-in-alt"></i>
                                <p>Data Rombel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('rayons.index') }}" class="nav-link">
                                <i class="fas fa-sign-in-alt"></i>
                                <p>Data Rayon</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li >
                    <a href="{{ route('registrasi') }}" class="nav-link">
                        <p class="bi bi-person">
                            Register
                        </p>
                    </a>
                </li>
                @endif
                <li >
                    <a href="{{ route('logout') }}" class="nav-link">
                        <p class="fas fa-sign-in-alt">
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
