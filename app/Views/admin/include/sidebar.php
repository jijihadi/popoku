<div class="app-main">
    <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>
        <?php $uri = new \CodeIgniter\HTTP\URI(current_url());?>
        <div class="scrollbar-sidebar">
            <div class="app-sidebar__inner">
                <ul class="vertical-nav-menu">
                    <li class="app-sidebar__heading">Dashboards</li>
                    <li>
                        <a href="<?=site_url()?>dashboard"
                            <?php if ($uri->getSegment(1)=='dashboard') { echo 'class="mm-active"'; }?>>
                            <i class="metismenu-icon pe-7s-target "></i>
                            Dashboard
                        </a>
                    </li>
                    <?php if (session()->level_id == 2 || session()->level_id == 1) :?>
                    <li class="app-sidebar__heading">Master Data</li>
                    <li>
                        <a href="<?=site_url()?>user"
                            <?php if ($uri->getSegment(1)=='user') { echo 'class="mm-active"'; }?>>
                            <i class="metismenu-icon pe-7s-users "></i>
                            Data User
                        </a>
                    </li>
                    <li>
                        <a href="<?=site_url()?>produk"
                            <?php if ($uri->getSegment(1)=='produk') { echo 'class="mm-active"'; }?>>
                            <i class="metismenu-icon pe-7s-box2 "></i>
                            Data Produk
                        </a>
                    </li>
                    <li>
                        <a href="<?=site_url()?>kategori"
                            <?php if ($uri->getSegment(1)=='kategori') { echo 'class="mm-active"'; }?>>
                            <i class="metismenu-icon pe-7s-ribbon "></i>
                            Data Kategori
                        </a>
                    </li>
                    <li>
                        <a href="<?=site_url()?>kurir"
                            <?php if ($uri->getSegment(1)=='kurir') { echo 'class="mm-active"'; }?>>
                            <i class="metismenu-icon pe-7s-bicycle "></i>
                            Data Kurir
                        </a>
                    </li>
                    <li>
                        <a href="<?=site_url()?>donasi"
                            <?php if ($uri->getSegment(1)=='donasi') { echo 'class="mm-active"'; }?>>
                            <i class="metismenu-icon pe-7s-box1 "></i>
                            Data Donasi 
                        </a>
                    </li>
                    <li>
                        <a href="<?=site_url()?>kegiatan"
                            <?php if ($uri->getSegment(1)=='kegiatan') { echo 'class="mm-active"'; }?>>
                            <i class="metismenu-icon pe-7s-note2  "></i>
                            Data Kegiatan
                        </a>
                    </li>
                    <li>
                        <a href="<?=site_url()?>pelatihan"
                            <?php if ($uri->getSegment(1)=='pelatihan') { echo 'class="mm-active"'; }?>>
                            <i class="metismenu-icon pe-7s-id  "></i>
                            Data Pelatihan
                        </a>
                    </li>
                    <li>
                        <a href="<?=site_url()?>artikel"
                            <?php if ($uri->getSegment(1)=='artikel') { echo 'class="mm-active"'; }?>>
                            <i class="metismenu-icon pe-7s-news-paper"></i>
                            Data Artikel
                        </a>
                    </li>
                    <li class="app-sidebar__heading">Master Laporan</li>
                    <li>
                        <a href="<?=site_url()?>laporan/lap_donasi"
                            <?php if ($uri->getSegment(1)=='lap_donasi') { echo 'class="mm-active"'; }?>>
                            <i class="metismenu-icon pe-7s-box1 "></i>
                            Laporan Donasi
                        </a>
                    </li>
                    <li>
                        <a href="<?=site_url()?>laporan/lap_kegiatan"
                            <?php if ($uri->getSegment(1)=='lap_kegiatan') { echo 'class="mm-active"'; }?>>
                            <i class="metismenu-icon pe-7s-albums "></i>
                            Laporan Kegiatan
                        </a>
                    </li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    </div>