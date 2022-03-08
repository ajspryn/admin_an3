<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="/"><span class="brand-logo">
                <img src="/app-assets/images/logoan3.png"></span>
                <h2 class="brand-text">AN3</h2>
            </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li><a class="d-flex align-items-center" href="/" ><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span></span></a>
                <ul class="menu-content">
                        <li class="{{ Request::is('/','dashboard')? "active":"nav-item" }} "><a class="d-flex align-items-center" href="/"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">Analytics</span></a>
                        </li>
                        <li class="{{ Request::is('layanan*')? "active":"nav-item" }} "><a class="d-flex align-items-center" href="/layanan"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="eCommerce">Layanan</span></a>
                        </li>
                    </ul>
            </li>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Menu Utama</span><i data-feather="more-horizontal"></i>
                <li class="{{ Request::is('penyedia_layanan*')? "active":"" }} "><a class="d-flex align-items-center" href="/penyedia_layanan"><i data-feather='package'></i><span class="menu-item text-truncate" data-i18n="List">Penyedia Layanan</span></a>
                </li>
                <li class="{{ Request::is('ketersediaan*')? "active":"" }} "><a class="d-flex align-items-center" href="/ketersediaan"><i data-feather="database"></i><span class="menu-item text-truncate" data-i18n="List">Ketersediaan</span></a>
                </li>
                <li class="{{ Request::is('pengguna_layanan*')? "active":"" }} "><a class="d-flex align-items-center" href="/pengguna_layanan"><i data-feather="users"></i><span class="menu-item text-truncate" data-i18n="List">Pengguna Layanan</span></a>
                </li>
                <li class="{{ Request::is('pendaftaran*')? "active":"" }} "><a class="d-flex align-items-center" href="/pendaftaran"><i data-feather="file-text"></i><span class="menu-item text-truncate" data-i18n="List">Pendaftaran</span></a>
                </li>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
