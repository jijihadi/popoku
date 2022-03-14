<div class="row">
    <div class="col-12">
        <div class="main-card mb-0 card ">
            <div class="card-header">
                <div class="col-lg-8 col-md-6">
                    <?=$title?>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="<?=site_url()?>donasi/add" class="pull-right"><button class="btn btn-primary"><i
                                class="fa fa-plus"></i> Tambah</button></a>
                </div>
            </div>
            <div class="card-body" style="overflow: scroll;">
                <?php if (session()->getFlashdata('msg')): ?>
                <?=session()->getFlashdata('msg')?>
                <?php endif;?>
                <table id="table1" class="table table-stripped dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Permintaan Penjemputan</th>
                            <th>Nama Donatur</th>
                            <th>Jumlah Donasi</th>
                            <th>Alamat Penjemputan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($donasi as $row): ?>
                        <tr>
                            <td><b><?=$i;?></b></td>
                            <td><?=tgl_indo(date('Y-m-d H:i', strtotime($row['tanggal_pengajuan'])));?></td>
                            <td><?=$row['nama'];?></td>
                            <td><?=$row['jumlah_donasi'];?></td>
                            <td><?=$row['alamat_jemput'];?></td>
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
                            <td>
                                <?php
                                    $db = db_connect();
                                     $user = $db->table('tb_user')->where('id_user', $row['id_user'])->get();
                                     $hp = $user->getResultArray();
                                     $hp=$hp[0]['no_hp'];
                                     $hp = substr($hp, 1);
                                     $hp = "62".$hp;

                                    //  
                                    $text = "Hai+kak%2C+kita+dari+tim+Popokku%2C+hendak+mengkonfirmasi+terkait+donasi+kakak%2C+apa+kaka+bersedia%3F"
                                ?>
                            <a href="https://wa.me/<?=$hp?>?text=<?=$text?>" target="none"><button
                                        class="btn btn-success"><i class="fa fa-phone"></i> Verifikasi</button></a>
                                <a href="<?=site_url()?>donasi/edit/<?=$row['id_donasi']?>"><button
                                        class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button></a>
                                <a href="<?=site_url()?>donasi/delete/<?=$row['id_donasi']?>"><button
                                        class="btn btn-danger"
                                        onclick="return confirm('Hapus data donasi <?=$row['nama'];?> ?')"><i
                                            class="fa fa-trash"></i>
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