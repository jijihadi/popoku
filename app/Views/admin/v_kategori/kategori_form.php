<div class="row">
    <div class="col-12">
        <div class="main-card mb-0 card ">
            <div class="card-header"><?=$title?></div>
            <div class="card-body" style="overflow: scroll;">
                <?php if(session()->getFlashdata('msg')):?>
                <?= session()->getFlashdata('msg') ?>
                <?php endif;?>
                <?php
                    $nama       = '';
                    $nohp       = '';
                    $email      = '';
                    $password   = '';
                    $alamat     = '';
                    $levelid    = '';
                    $form       ='kategori/save/'.$tipe;
                    // print_r($user);
                    if (!empty($kategori)) {
                        foreach ($kategori as $row):
                            if ($tipe == 'user') {
                                $nama       = $row['level'];
                                $form       ='kategori/update/user/'.$row['id_level'];
                            } elseif ($tipe == 'produk') {
                                $nama       = $row['nama_kategori'];
                                $form       ='kategori/update/produk/'.$row['id_kategori'];
                            } elseif ($tipe == 'kapasitas') {
                                $nama       = $row['nama_level_kapasitas'];
                                $form       ='kategori/update/kapasitas/'.$row['id_level_kapasitas'];
                            }
                        endforeach;
                    }
                    // print_r ($kategori);
                    ?>
                <form action="<?=site_url().$form?>" method="post">
                    <div class="position-relative row form-group"><label for="exampleEmail"
                            class="col-sm-2 col-form-label">Nama Kategori <?=ucwords($tipe)?></label>
                        <div class="col-sm-10"><input name="nama" id="exampleNama" type="text" class="form-control"
                                value="<?=$nama?>">
                        </div>
                    </div>
                    <div class="position-relative row form-check">
                        <div class="col-12 ">
                            <button class="btn btn-success btn-lg pull-right">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>