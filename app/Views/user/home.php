<!--================Home Banner Area =================-->
<section class="home_banner_area">
    <div class="overlay"></div>
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content row">
                <div class="offset-lg-2 col-lg-8">
                    <h3>Donasikan Popok Bekasmu
                        <br/>Ayo Jaga Bumimu</h3>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p> -->
                    <a class="white_bg_btn" href="<?=site_url()?>userhome/donasi_baru">Donasi Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Hot Deals Area =================-->
<section class="hot_deals_area section_gap">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="hot_deal_box">
                <a href="<?=site_url()?>userhome/donasi_baru">
                    <img class="img-fluid" src="<?=site_url()?>assets/user/img/product/hot_deals/deal1.jpg" alt="">
                    <div class="content">
                        <h2>Donasi Popok</h2>
                        <p>Bekas Pakai</p>
                    </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="hot_deal_box">
                <a href="<?=site_url()?>userhome/produk">
                    <img class="img-fluid" src="<?=site_url()?>assets/user/img/product/hot_deals/deal2.jpg" alt="">
                    <div class="content">
                        <h2>Beli Produk</h2>
                        <p>Daur Ulang</p>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Hot Deals Area =================-->

<!--================Clients Logo Area =================-->
<section class="clients_logo_area">
    <div class="container-fluid">
        <center>
            <h2>" <i>When we heal the earth, we heal ourselves</i> "</h2>
        </center>
    </div>
</section>
<!--================End Clients Logo Area =================-->

<section class="container">

    <div class="col-lg-12">
     <center>
            <h2> <i>VISI</i> </h2>
            <p>terwujudnya lingkungan yang nyaman dan bersih sehingga dapat diwariskan 
                generasi berikutnya
            </p>
    </center>
    </div>



    <div class="col-lg-12">
        <center>
            <h2> <i>MISI</i> </h2>
            <p>1. Melakukan daur ulang sampah yang sulit terurai olah tanah</p>
            <p>2. memberikan edukasi terhadap masyakarat bahaya sampah</p>
            <p>3. mengadakan pelatihan pengolahan daur ulang limbah sampah</p>
        </center>
    </div>
</section>

<!--================Feature Product Area =================-->
<!-- <section class="feature_product_area section_gap">
    <div class="main_box">
        <div class="container-fluid">
            <div class="row">
                <div class="main_title">
                    <h2>Featured Products</h2>
                    <p>Who are in extremely love with eco friendly system.</p>
                </div>
            </div>
            <div class="row">
                <?php foreach ($produk as $row) :?>
                <div class="col col1">
                    <div class="f_p_item">
                        <div class="f_p_img">
                            <img class="img-fluid" src="<?=site_url()?>assets/file_upload/produk/f-p-4.jpg" alt="">
                            <div class="p_icon">
                                <a href="<?=site_url()?>userhome/detail_produk/<?=$row['id_produk']?>">
                                    <i class="lnr lnr-eye"></i>
                                </a>
                                <a href="#">
                                    <i class="lnr lnr-cart"></i>
                                </a>
                            </div>
                        </div>
                        <a href="<?=site_url()?>userhome/detail_produk/<?=$row['id_produk']?>">
                            <h4><?=$row['nama_produk']?></h4>
                        </a>
                        <h5><?=rupiah($row['harga'])?></h5>
                    </div>
                </div>
                <?php endforeach;?>
            </div>

        </div>
    </div>
</section> -->
<!--================End Feature Product Area =================-->