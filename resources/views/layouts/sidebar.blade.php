<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{ route('dashboard_page') }}">
        <img src="./assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Stockpage</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link dashboard text-white" href="{{ route('dashboard_page') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link dashboard text-white" href="{{ route('grafik_page') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Grafik</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link intraday text-white" href="{{ route('stock_page') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Saham</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link daily text-white" href="{{ route('daily_stock_page') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Rekap Saham</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link forex text-white" href="{{ route('forex_page') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Valas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link company text-white" href="{{ route('company_page') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1">Tinjauan Perusahaan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link exchange text-white" href="{{ route('exchange_page') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">Kurs</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link anfu text-white" data-toggle="collapse">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Analisis Fundamental</span>
          </a>
        </li>
        <div class="submenu-collapse" id="anfumenu">
          <li class="nav-item">
            <a class="nav-link eps text-white " href="{{ route('fundamental_page') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Rekap Fundamental</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link eps text-white " href="{{ route('eps_page') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">EPS</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link per text-white " href="{{ route('per_page') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <!-- <i class="material-icons opacity-10"></i> -->
              </div>
              <span class="nav-link-text ms-1">PER</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link pbv text-white " href="{{ route('pbv_page') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <!-- <i class="material-icons opacity-10"></i> -->
              </div>
              <span class="nav-link-text ms-1">PBV</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link roe text-white " href="{{ route('roe_page') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <!-- <i class="material-icons opacity-10"></i> -->
              </div>
              <span class="nav-link-text ms-1">ROE</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link dy text-white " href="{{ route('dy_page') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <!-- <i class="material-icons opacity-10"></i> -->
              </div>
              <span class="nav-link-text ms-1">DY</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link der text-white " href="{{ route('der_page') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <!-- <i class="material-icons opacity-10"></i> -->
              </div>
              <span class="nav-link-text ms-1">DER</span>
            </a>
          </li>
        </div>
        <li class="nav-item">
          <a class="nav-link company-list text-white " href="{{ route('company_list') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Company</span>
          </a>
        </li>
        <!-- <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="./pages/profile.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="./pages/sign-in.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="./pages/sign-up.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li> -->
      </ul>
    </div>
    <!-- <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
      </div>
    </div> -->
  </aside>