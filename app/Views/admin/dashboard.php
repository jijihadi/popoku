<div class="row">
    <?php if (session()->level_id == 2 || session()->level_id == 1) :?>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Donasi</div>
                    <div class="widget-subheading">yang telah diselesaikan</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span><?=$donasi_done?></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-premium-dark">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Donasi</div>
                    <div class="widget-subheading">yang belum diselesaikan</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span><?=$donasi_notyet?></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-grow-early">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Kurir</div>
                    <div class="widget-subheading">yang siap bertugas</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span><?=$kurir?></span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<div class="col-12">
    <div class="main-card mb-0 card ">
        <div class="card-header">
            <div class="col-8">
                Data Donasi Terbaru
            </div>
            <div class="col-4 ">
            </div>
        </div>
        <div class="card-body" style="overflow: scroll;">
            <?php if (session()->getFlashdata('msg')): ?>
            <?=session()->getFlashdata('msg')?>
            <?php endif;?>
            <table class="table table-stripped table-striped dtr-inline">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Permintaan Penjemputan</th>
                        <th>Nama Donatur</th>
                        <th>Jumlah Donasi</th>
                        <th>Alamat Penjemputan</th>
                        <th>Tanggal Penjemputan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($donasi_latest as $row): ?>
                    <tr>
                        <td><b><?=$i;?></b></td>
                        <td><?=tgl_indo(date('Y-m-d H:i', strtotime($row['tanggal_pengajuan'])));?></td>
                        <td><?=$row['nama'];?></td>
                        <td><?=$row['jumlah_donasi'];?></td>
                        <td><?=$row['alamat_jemput'];?></td>
                        <td><?=tgl_indo(date('Y-m-d H:i', strtotime($row['tanggal_diambil'])));?></td>
                    </tr>
                    <?php $i++;endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<?php elseif (session()->level_id == 3) :?>
<div class="col-12">
    <div class="main-card mb-0 card ">
        <div class="card-header">
            <div class="col-8">
                Data Donasi Terbaru 
            </div>
            <div class="col-4 ">
            </div>
        </div>
        <div class="card-body" style="overflow: scroll;">
            <?php if (session()->getFlashdata('msg')): ?>
            <?=session()->getFlashdata('msg')?>
            <?php endif;?>
            <table class="table table-stripped table-striped dtr-inline">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Permintaan Penjemputan</th>
                        <th>Nama Donatur</th>
                        <th>Jumlah Donasi</th>
                        <th>Alamat Penjemputan</th>
                        <th>Tanggal Penjemputan</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php $i=1; foreach ($donasi_latest as $row): ?>
                    <tr>
                        <td><b><?=$i;?></b></td>
                        <td><?=tgl_indo(date('Y-m-d H:i', strtotime($row['tanggal_pengajuan'])));?></td>
                        <td><?=$row['nama'];?></td>
                        <td><?=$row['jumlah_donasi'];?></td>
                        <td><?=$row['alamat_jemput'];?></td>
                        <td><?=tgl_indo(date('Y-m-d H:i', strtotime($row['tanggal_diambil'])));?></td>
                        <td>
                        <button class="btn btn-success" onclick=" window.open('https://www.google.com/maps/search/?api=1&query=<?=$row['lati'].",".$row['longi'];?>','_blank')"> Arahkan Saya</button>
                        </td>
                    </tr>
                    <?php $i++;endforeach; else: ?>
                        <td colspan="7" align="center"><b><i>Belum ada Penjemputan</i></b></td>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<?php endif;?>
</div>
</div>