<?php $i = 1; foreach ($artikel as $row): ?>
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

<section class="blog_area single-post-area p_120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <img src="<?=site_url()?>assets/file_upload/artikel/<?=$row['headline']?>" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-3">
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
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-9 blog_details">
                        <h2><?=$row['judul']?></h2>
                        <?=$row['isi']?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endforeach;?>
<!--================Blog Area =================-->
<hr>