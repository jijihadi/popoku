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

<!--================Content =================-->
<section class="sample-text-area">
    <div class="container">
        <div class="whole-wrap">
            <div class="section-top-border">
                    <h3 class="mb-30 title_color">
                    <?php if (session()->getFlashdata('msg')): ?>
                    <?=session()->getFlashdata('msg')?>
                    <?php endif;?>
                        Data Donasi Anda
                        <a href="<?=site_url()?>userhome/donasi_baru">
                            <button class="btn btn-primary pull-right"><i class="lnr lnr-plus-circle"></i>  Tambah</button>
                        </a>
                    </h3>
                <div class="progress-table-wrap">
                    <div class="progress-table">
                        <?php if (session()->getFlashdata('msg')): ?>
                        <?=session()->getFlashdata('msg')?>
                        <?php endif;?>
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Tanggal Donasi</th>
                                <th>Jumlah Donasi</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach ($donasi as $row): ?>
                                <tr>
                                    <td><strong><?=$i;?></strong></td>
                                    <td><?=tgl_indo(date('Y-m-d H:i', strtotime($row['tanggal_pengajuan'])));?></td>
                                    <td><?=$row['jumlah_donasi'];?></td>
                                    <td>
                                        <?php if ($row['status_donasi']==0) {
                                    echo '<a class="text-danger">Belum Diproses</a>';
                                } else if ($row['status_donasi']==1) {
                                    echo '<a class="text-primary">Diproses</a>';
                                } else if ($row['status_donasi']==2) {
                                    echo '<a class="text-success">Selesai</a>';
                                }
                                ?>
                                    </td>
                                </tr>
                                <?php $i++;endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<hr>