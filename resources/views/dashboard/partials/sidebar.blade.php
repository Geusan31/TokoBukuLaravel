<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
          <span data-feather="home" class="align-text-bottom"></span>
          Dashboard
        </a>
      </li>
      @if (auth()->user()->level == 'admin' || auth()->user()->level == 'manager')
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/buku*') ? 'active' : '' }}" href="/dashboard/buku">
          <span data-feather="book" class="align-text-bottom"></span>
          Daftar Buku
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/transaksi*') ? 'active' : '' }}" href="/dashboard/transaksi">
          <span data-feather="shopping-cart" class="align-text-bottom"></span>
          Transaksi
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/laporan') ? 'active' : '' }}" href="/dashboard/laporan">
          <span data-feather="clipboard" class="align-text-bottom"></span>
          Laporan
        </a>
      </li>
    </ul>
  </div>
</nav>