<div class="user">
    <div class="avatar-sm float-left mr-2">
        <img src="{{ asset('storage/photos/'.Auth::user()->photo) }}" alt="..." class="avatar-img rounded-circle">
    </div>
    <div class="info">
        <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
            <span>
                <span class="user-level">{{ Auth::user()->name}}</span>
                <span class="user-level">{{ old('email', Auth::user()->email) }}</span>

            </span>
        </a>



    </div>
</div>

<ul class="nav nav-primary">
    @if (auth()->user()->role_id == 2)
    <li class="nav-item {{ Request::is('Dashboard-bidang')? "active":"" }}">
        <a href="{{ url('Dashboard-bidang') }}" class="collapsed" aria-expanded="true">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>
    @endif
    @if (auth()->user()->role_id == 1)
    <li class="nav-item {{ Request::is('Superadmin')? "active":"" }}">
        <a href="{{ url('Superadmin') }}" class="collapsed" aria-expanded="true">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>
    @endif
    @if (auth()->user()->role_id == 3)
    <li class="nav-item {{ Request::is('Admin')? "active":"" }}">
        <a href="{{ url('Admin') }}" class="collapsed" aria-expanded="true">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>
    @endif
    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Components</h4>
    </li>
    <li class="nav-item {{ Request::is('barang')? "active":"" }} {{ Request::is('Barang-bidang')? "active":"" }}{{ Request::is('kategori')? "active":"" }}{{ Request::is('satuan')? "active":"" }}">
        <a data-toggle="collapse" href="#base">
            <i class="fas fa-database"></i>
            <p>Data Barang</p>
            <span class="caret"></span>
        </a>
        <div class="collapse" id="base">
            <ul class="nav nav-collapse">

                <li class="{{ Request::is('satuan')? "active":"" }}">
                    <a href="{{ url('satuan') }}">
                        <span class="sub-item">Satuan Barang</span>
                    </a>
                </li>
                <li class="{{ Request::is('kategori')? "active":"" }}">
                    <a href="{{ url('kategori') }}">
                        <span class="sub-item">Kategori Barang</span>
                    </a>
                </li>
                @if (auth()->user()->role_id == 1)
                <li class="{{ Request::is('barang')? "active":"" }}">
                    <a href="{{ url('barang') }}">
                        <span class="sub-item">Data Barang</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->role_id == 3)
                <li class="{{ Request::is('barang-admin')? "active":"" }}">
                    <a href="{{ url('barang-admin') }}">
                        <span class="sub-item">Data Barang</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->role_id == 2)
                <li class="{{ Request::is('Barang-bidang')? "active":"" }}">
                    <a href="{{ url('Barang-bidang') }}">
                        <span class="sub-item">Data Barang</span>
                    </a>
                </li>
                @endif


            </ul>
        </div>
    </li>
    @if (auth()->user()->role_id == 2)
    <li class="nav-item  {{ Request::is('barang-masuk-bidang')? "active":"" }}">
        <a href="{{ url('barang-masuk-bidang') }}">
            <i class="fas fa-sign-in-alt"></i>
            <p>Barang Masuk</p>

        </a>
    </li>
    @endif
    @if (auth()->user()->role_id == 2)
    <li class="nav-item  {{ Request::is('barang-keluar-bidang')? "active":"" }}">
        <a href="{{ url('barang-keluar-bidang') }}">
            <i class="fas fa-sign-in-alt"></i>
            <p>Barang Keluar</p>

        </a>
    </li>
    @endif

    @if (auth()->user()->role_id == 1)
    <li class="nav-item  {{ Request::is('barang-masuk')? "active":"" }}">
        <a href="{{ url('barang-masuk') }}">
            <i class="fas fa-sign-in-alt"></i>
            <p>Barang Masuk</p>

        </a>
    </li>
    @endif
    @if (auth()->user()->role_id == 3)
    <li class="nav-item  {{ Request::is('barang-masuk-admin')? "active":"" }}">
        <a href="{{ url('barang-masuk-admin') }}">
            <i class="fas fa-sign-in-alt"></i>
            <p>Barang Masuk</p>

        </a>
    </li>
    @endif
    @if (auth()->user()->role_id == 1)
    <li class="nav-item {{ Request::is('barang-keluar')? "active":"" }}">
        <a href="{{ url('barang-keluar') }}">
            <i class="fas fa-sign-out-alt"></i>
            <p>Barang Keluar</p>
        </a>
    </li>
    @endif
    @if (auth()->user()->role_id == 3)
    <li class="nav-item {{ Request::is('barang-keluar-admin')? "active":"" }}">
        <a href="{{ url('barang-keluar-admin') }}">
            <i class="fas fa-sign-out-alt"></i>
            <p>Barang Keluar</p>
        </a>
    </li>
    @endif

    @if (auth()->user()->role_id == 1)
    <li class="nav-item {{ Request::is('pengguna')? "active":"" }}">
        <a href="{{ url('pengguna') }}">
            <i class="fas fa-users"></i>
            <p>Pengguna</p>

        </a>

    </li>
    @endif
    @if (auth()->user()->role_id == 2)
    <li class="nav-item {{ Request::is('laporan-bidang')? "active":"" }}">
        <a href="{{ url('laporan-bidang') }}">
            <i class="fas fa-file-alt"></i>
            <p>Laporan</p>

        </a>

    </li>
    @endif
    @if (auth()->user()->role_id == 1)
    <li class="nav-item {{ Request::is('Laporan')? "active":"" }}">
        <a href="{{ url('Laporan') }}">
            <i class="fas fa-file-alt"></i>
            <p>Laporan Barang</p>
            {{-- <span class="caret"></span> --}}
        </a>

    </li>
    @endif
    @if (auth()->user()->role_id == 3)
    <li class="nav-item {{ Request::is('Laporan-admin')? "active":"" }}">
        <a href="{{ url('Laporan-admin') }}">
            <i class="fas fa-file-alt"></i>
            <p>Laporan Barang</p>
            {{-- <span class="caret"></span> --}}
        </a>

    </li>
    @endif
    <li class="mx-4 mt-2">
        <a href="{{url('logout')}}" method="get" class="btn btn-danger btn-block"><span class="btn-label mr-2"> <i class="fas fa-rocket"></i> </span>Logout</a>
    </li>


</ul>