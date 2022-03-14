<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?=site_url()?>assets/user/img/favicon.png" type="image/png">
    <title><?=$title?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=site_url()?>assets/user/css/bootstrap.css">
    <link rel="stylesheet" href="<?=site_url()?>assets/user/vendors/linericon/style.css">
    <link rel="stylesheet" href="<?=site_url()?>assets/user/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=site_url()?>assets/user/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=site_url()?>assets/user/vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="<?=site_url()?>assets/user/vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="<?=site_url()?>assets/user/vendors/animate-css/animate.css">
    <link rel="stylesheet" href="<?=site_url()?>assets/user/vendors/jquery-ui/jquery-ui.css">
    <!-- main css -->
    <link rel="stylesheet" href="<?=site_url()?>assets/user/css/style.css">
    <link rel="stylesheet" href="<?=site_url()?>assets/user/css/responsive.css">
</head>

<body>

    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="top_menu row m0">
            <div class="container-fluid">
                <div class="float-left">
                    <p>Whastapp : 087 857 123 011</p>
                </div>
            </div>
        </div>
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="<?=site_url()?>userhome">
                        <h3 style="color:#1641ff;">POPOKU</h3>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <?php $uri = new \CodeIgniter\HTTP\URI(current_url());?>
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <div class="row w-100">
                            <div class="col-lg-7 pr-0">
                                <ul class="nav navbar-nav center_nav pull-right">
                                    <li
                                        class="nav-item 
                                    <?php if ($uri->getSegment(1)=='userhome' && $uri->getSegment(1)==''|| $uri->getSegment(1)=='' ) { echo 'active'; }?>">
                                        <a class="nav-link" href="<?=site_url()?>userhome">Home</a>
                                    </li>
                                    <li
                                        class="nav-item 
                                    <?php if ($uri->getSegment(1)=='donasi' || $uri->getSegment(1)=='donasi_baru') { echo 'active'; }?>">
                                        <a class="nav-link" href="<?=site_url()?>userhome/donasi">Donasi</a>
                                    </li>
                                    <li
                                        class="nav-item 
                                    <?php if ($uri->getSegment(1)=='detail_produk' ||  $uri->getSegment(1)=='produk') { echo 'active'; }?>">
                                        <a class="nav-link" href="<?=site_url()?>userhome/produk">Produk</a>
                                    </li>
                                    <li class="nav-item 
                                    <?php if ($uri->getSegment(1)=='pelatihan' || $uri->getSegment(1)=='pelatihan_baru') { echo 'active'; }?>">
                                        <a class="nav-link" href="<?=site_url()?>userhome/pelatihan">Pelatihan</a>
                                    </li>
                                    <li
                                        class="nav-item 
                                    <?php if ($uri->getSegment(1)=='artikel' || $uri->getSegment(1)=='artikel_detail') { echo 'active'; }?>">
                                        <a class="nav-link" href="<?=site_url()?>userhome/artikel">Artikel</a>
                                    </li>
                                    <li class="nav-item 
                                    <?php //if ($uri->getSegment(1)=='userhome') { echo 'active'; }?>">
                                        <a class="nav-link" href="<?=site_url()?>userhome/kegiatan">Kegiatan</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-5">
                                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                                    <hr>
                                    <?php if (session()->get('nama')=='') :?>
                                    <li class="nav-item">
                                        <a href="<?=site_url()?>login" class="icons">
                                            <i class="lnr lnr lnr-user"></i>
                                        </a>
                                    </li>
                                    <hr>
                                    <?php else:?>
                                    <hr>
                                    <li class="nav-item">
                                        <a href="#" class="icons">
                                            <small style="padding-left:1em;"><?=session()->get('nama');?></small>
                                            <i class="lnr lnr lnr-smile" style="padding-right:1em;"></i>
                                        </a>
                                    </li>
                                    <hr>
                                    <li class="nav-item">
                                        <a href="<?=site_url()?>/login/logout"" class="icons">
                                            <i class="lnr lnr lnr-exit"></i>
                                        </a>
                                    </li>
                                    <hr>
                                    <?php endif;?>
                                    <!-- <li class="nav-item">
                                        <a href="#" class="icons">
                                            <i class="lnr lnr lnr-pushpin"></i>
                                        </a>
                                    </li>
                                    <hr>
                                    <li class="nav-item">
                                        <a href="#" class="icons">
                                            <i class="lnr lnr lnr-cart"></i>
                                        </a>
                                    </li> -->
                                    <hr>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================Header Menu Area =================-->