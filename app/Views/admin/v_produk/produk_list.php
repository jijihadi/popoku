<div class="row">
    <div class="col-12">
        <div class="main-card mb-0 card ">
            <div class="card-header">
                <div class="col-lg-8 col-md-6">
                    <?=$title?>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="<?=site_url()?>produk/add" class="pull-right"><button class="btn btn-primary"><i
                                class="fa fa-plus"></i> Tambah</button></a>
                </div>
            </div>
            <div class="card-body" style="overflow: scroll;">
                <?php if (session()->getFlashdata('msg')): ?>
                <?=session()->getFlashdata('msg')?>
                <?php endif;?>
                <table id="table1" class="table table-stripped dataTable dtr-inline" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($produk as $row): ?>
                        <tr>
                            <td><b><?=$i;?></b></td>
                            <td><?=$row['nama_produk'];?></td>
                            <td><?=$row['nama_kategori'];?></td>
                            <td><?=$row['stok_produk'];?></td>
                            <td><?=rupiah($row['harga']);?></td>
                            <td>
                                <a href="<?=site_url()?>produk/edit/<?=$row['id_produk']?>"><button
                                        class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                                <a href="<?=site_url()?>produk/delete/<?=$row['id_produk']?>"><button class="btn btn-danger"
                                        onclick="return confirm('Hapus data produk <?=$row['nama_produk'];?> ?')"><i class="fa fa-trash"></i>
                                        Delete</button></a>
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
</div>