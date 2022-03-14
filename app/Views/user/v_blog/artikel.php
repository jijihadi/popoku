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
            <div class="col-lg-12" style="padding:2em 2em 2em;">
                <center>
                    <h1>Artikel </h1>
                    <hr>
                </center>
            </div>
            <div class="col-lg-12">
                <?php $i = 1; foreach ($artikel as $row): ?>
                <div class="blog_left_sidebar">
                    <article class="row blog_item">
                        <div class="col-md-4">
                            <div class="blog_info text-right">
                                <ul class="blog_meta list">
                                    <li>
                                        <a href="#"><a
                                                href="#"><?=tgl_indo(date('Y-m-d', strtotime($row['tanggal_rilis'])));?></a>
                                            <i class="lnr lnr-calendar-full"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <?php if ($row['edited']!=0) :?>
                                        <span class="badge badge-pill badge-info">edited</span>
                                        <?php else:?>
                                        <span class="badge badge-pill badge-success">original</span>
                                        <?php endif;?>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <h3><?=$row['judul']?></h3>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="blog_post">
                                <a href="<?=site_url()?>userhome/artikel_detail/<?=$row['id_artikel']?>">
                                    <img src="<?=site_url()?>assets/file_upload/artikel/<?=$row['headline']?>" alt="">
                                </a>
                                <div class="blog_details">
                                    <p><?=limit_text($row['isi'], 20)?></p>
                                    <a href="<?=site_url()?>userhome/artikel_detail/<?=$row['id_artikel']?>"
                                        class="white_bg_btn">View More</a>
                                </div>
                            </div>
                        </div>
                    </article>
                    <hr>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
<hr>