<section class="home_banner_area">
    <div class="overlay"></div>
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content row">
                <div class="offset-lg-2 col-lg-8">
                    <h3><?=$title?></h3>
                    <p>
                        <a href="<?=site_url()?>userhome" style="color:white;">Home</a>&rarr;
                        <a style="color:white;"><?=$title?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Banner Area =================-->

<!--================Blog Area =================-->
<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="padding:2em">
                <center>
                    <h1>Daftar Kegiatan </h1>
                    <hr>
                    <?php if (session()->getFlashdata('msg')): ?>
                    <?=session()->getFlashdata('msg')?>
                    <?php endif;?>
                </center>
            </div>
            <div class="col-lg-12">
                <?php $i = 1; foreach ($kegiatan as $row): ?>
                <div class="blog_left_sidebar">
                    <div class="section-top-border">
                        <h3 class="mb-30 title_color"><?=$row['nama_kegiatan']?> <small>tanggal
                            <?=tgl_indo(date('Y-m-d', strtotime($row['waktu_kegiatan'])));?></small></h3>
                        <div class="row">
                            <div class="col-lg-10">
                                <blockquote class="generic-blockquote">
                                    <ul class="blog_meta list">
                                        <li>
                                            <img src="<?=site_url()?>assets/file_upload/kegiatan/<?=$row['foto_kegiatan']?>" style="max-height:300px;">
                                        </li>
                                        <li>
                                            <p><?=limit_text($row['deskripsi_kegiatan'], 20)?></p>
                                        </li>
                                        <li>
                                            <p>
                                                <i class="lnr lnr-map"></i>
                                                <?=$row['lokasi_kegiatan']?>
                                            </p>
                                        </li>
                                    </ul>
                                </blockquote>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
<hr>