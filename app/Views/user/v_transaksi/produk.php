<!--================Home Banner Area =================-->
<section class="home_banner_area">
    <div class="overlay"></div>
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content row">
                <div class="offset-lg-2 col-lg-8">
                    <h3><?=$title?></h3>
                    <p>
                        <a href="<?=site_url()?>userhome" style="color:white;">Home</a>&rarr;
                        <a href="<?=site_url()?>userhome/donasi" style="color:white;">Donasi</a>&rarr;
                        <a href="<?=site_url()?>userhome/donasi_baru" style="color:white;"><?=$title?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->

<!--================Feature Product Area =================-->
<section class="feature_product_area section_gap">
    <div class="main_box">
        <div class="container-fluid">
            <div class="row">
                <div class="main_title">
                    <h2>Produk Daur Ulang</h2>
                    <p>100% Terbuat dari limbah daur ulang sampah yang dikreasikan dengan mantap.</p>
                    <hr>
                </div>
            </div>
            <div class="row">
                <?php foreach ($produk as $row) :?>
                <div class="col col1">
                    <div class="f_p_item">
                        <div class="f_p_img">
                            <img class="img-fluid" src="<?=site_url()?>assets/file_upload/produk/<?=$row['gambar']?>" alt="">
                            <div class="p_icon">
                                <a href="<?=site_url()?>userhome/detail_produk/<?=$row['id_produk']?>">
                                    <i class="lnr lnr-eye"></i>
                                </a>
                                <?
                                    $hp = "6283831936745";
                                    $product = strreplace(" ", "+", $row['nama_produk']);
                                    $text = "Hai+kak%2C+kita+mau+beli+produk+kakak+yang+$product+dong%3F"
                                ?>
                                <a href="https://wa.me/<?=$hp?>?text=<?=$text?>" target="none">
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
</section>
<!--================End Feature Product Area =================-->

<hr>