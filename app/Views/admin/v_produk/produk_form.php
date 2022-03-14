<div class="row">
    <div class="col-12">
        <div class="main-card mb-0 card ">
            <div class="card-header"><?=$title?></div>
            <div class="card-body" style="overflow: scroll;">
                <?php if (session()->getFlashdata('msg')): ?>
                <?=session()->getFlashdata('msg')?>
                <?php endif;?>
                <?php
                    $nama = '';
                    $id_kategori = '';
                    $harga = '';
                    $deskripsi = '';
                    $stok = '';
                    $gambar = '';
                    $form = 'produk/save';
                    // print_r($user);
                    if (!empty($produk)) {
                        foreach ($produk as $row):
                            $nama = $row['nama_produk'];
                            $id_kategori = $row['id_kategori'];
                            $harga = $row['harga'];
                            $deskripsi = $row['deskripsi_produk'];
                            $stok = $row['stok_produk'];
                            $gambar = '<img src="'.site_url().'assets/file_upload/produk/'.$row['gambar'].'" style="max-height:200px;">';
                            $form = 'produk/update/' . $row['id_produk'];
                        endforeach;
                    }
                ?>
                <form action="<?=site_url() . $form?>" method="post" enctype="multipart/form-data">
                    <div class="position-relative row form-group">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <?=$gambar?>
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleEmail"
                            class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10"><input name="nama" id="exampleNama" type="text" class="form-control"
                                value="<?=$nama?>">
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelect"
                            class="col-sm-2 col-form-label">Kategori Produk</label>
                        <div class="col-sm-10"><select name="id_kategori" id="examplelevel" class="form-control"
                                placeholder="Pilih user...">
                                <option value="">pilih salah satu</option>
                                <?php $i = 1;foreach ($kategori as $l): ?>
                                <option <?php if ($l['id_kategori'] == $id_kategori) {echo 'selected';}?>
                                    value="<?=$l['id_kategori'];?>"><?=$l['nama_kategori'];?></option>
                                <?php $i++;endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleEmail"
                            class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10"><input name="harga" id="exampleNama" type="text" class="form-control"
                                value="<?=$harga?>">
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleText"
                            class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10"><textarea name="deskripsi" id="examplealamat"
                                class="form-control autosize-input"><?=$deskripsi?></textarea>
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleEmail"
                            class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10"><input name="stok" id="exampleEmail" type="number" class="form-control"
                                value="<?=$stok?>">
                            <!-- <small class="form-text text-muted">Email akan digunakan untuk login akun anda.</small> -->
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleEmail"
                            class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10"><input name="gambar" class="form-control form-control-sm"
                                id="exampleEmail" type="file">
                        </div>
                    </div>
                    <!-- <div class="position-relative row form-group"><label for="exampleFile"
                            class="col-sm-2 col-form-label">File</label>
                        <div class="col-sm-10"><input name="file" id="exampleFile" type="file"
                                class="form-control-file">
                            <small class="form-text text-muted">This is some placeholder block-level help text for the
                                above input. It's a bit lighter and easily wraps to a new line.</small>
                        </div>
                    </div> -->
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