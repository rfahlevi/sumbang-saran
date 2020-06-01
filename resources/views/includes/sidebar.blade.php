<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <i class="ml-3 fas fa-box-open"></i>
      <span class="brand-text font-weight-light">Sumbang Saran</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{url('assets/img/user/',Auth::user()->foto)}}" style="width:40px; height:40px;" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <span class="d-block text-white mt-1">{{Auth::user()->name}}</span>
          </div>
        </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('dashboard')}}" class="nav-link {{Request::is('dashboard') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          @if(Auth::user()->role == 0)
          <li class="nav-header">JOB ADMIN</li>
          <li class="nav-item">
            <a href="{{url('jadwal')}}" class="nav-link {{Request::is('jadwal') ? 'active' : ''}}">
              <i class="nav-icon fas fa-calendar-plus"></i>
              <p>Jadwal Sumbang Saran</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('sumbang-saran')}}" class="nav-link {{Request::is('sumbang-saran') ? 'active' : ''}}">
              <i class="nav-icon fab fa-audible"></i>
              <p>Kelola Sumbang Saran</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('karyawan')}}" class="nav-link {{Request::is('karyawan') ? 'active' : ''}}">
              <i class="nav-icon fas fa-database"></i>
              <p>Data Karyawan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('user')}}" class="nav-link {{Request::is('user') ? 'active' : ''}}">
              <i class="fas fa-user-friends"></i>
              <p>Manajemen User</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Lainya
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{url('bagian')}}" class="nav-link">
                  <i class="fas fa-layer-group nav-icon"></i></i>
                  <p>Bagian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('extension')}}" class="nav-link">
                  <i class="fas fa-headphones nav-icon"></i></i>
                  <p>Extension</p>
                </a>
              </li>
            </ul>
          </li>
          @else
          <li class="nav-header">JOB TIM PENILAI</li>
          <li class="nav-item">
            <a href="{{url('penilaian')}}" class="nav-link {{Request::is('penilaian') ? 'active' : ''}}">
              <i class="nav-icon fas fa-star-half-alt"></i>
              <p>Penilaian</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('peserta-terbaik')}}" class="nav-link {{Request::is('peserta-terbaik') ? 'active' : ''}}">
              <i class="nav-icon fas fa-medal"></i>
              <p>Peserta Terbaik</p>
            </a>
          </li>
          @endif
          <li class="nav-header">AKUN</li>
          <li class="nav-item">
              <a  class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  {{ __('Keluar') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>