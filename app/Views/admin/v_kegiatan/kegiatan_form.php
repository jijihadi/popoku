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
                    $waktu = '';
                    $lokasi = '';
                    $deskripsi_kegiatan = '';
                    $foto_kegiatan = '';
                    $pp = '';
                    $form = 'kegiatan/save';
                    // print_r($user);
                    if (!empty($kegiatan)) {
                        foreach ($kegiatan as $row):
                            $nama_kegiatan = $row['nama_kegiatan'];
                            $waktu = $row['waktu_kegiatan'];
                            $lokasi = $row['lokasi_kegiatan'];
                            $deskripsi_kegiatan = $row['deskripsi_kegiatan'];
                            $foto_kegiatan = $row['foto_kegiatan'];
                            $form = 'kegiatan/update/' . $row['id_kegiatan'];
                            $pp = '<img src="'.site_url().'/assets/file_upload/kegiatan/'.$foto_kegiatan.'"  style="max-width:200px;">';
                        endforeach;
                    }
                ?>
                <form action="<?=site_url() . $form?>" method="post" enctype="multipart/form-data">
                    <div class="position-relative row form-group"><label for="exampleText"
                            class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                        <?=$pp?>
                        </div>
                    </div>
                    
                    <div class="position-relative row form-group"><label for="exampleEmail"
                            class="col-sm-2 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-10"><input name="nama_kegiatan" id="exampleNama" type="text"
                                class="form-control" value="<?=$nama_kegiatan?>">
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleEmail"
                            class="col-sm-2 col-form-label">Waktu Pelaksanaan</label>
                        <div class="col-sm-10">
                        <input name="waktu" id="exampledate" type="text"
                                class="form-control" value="<?=$waktu?>">
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleText"
                            class="col-sm-2 col-form-label">Lokasi Kegiatan</label>
                        <div class="col-sm-10"><textarea name="lokasi" id="examplealamat"
                                class="form-control autosize-input"><?=$lokasi?></textarea>
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleText"
                            class="col-sm-2 col-form-label">Deskripsi Kegiatan</label>
                        <div class="col-sm-10"><textarea name="deskripsi_kegiatan" id="examplealamat"
                                class="form-control autosize-input"><?=$deskripsi_kegiatan?></textarea>
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleFile"
                            class="col-sm-2 col-form-label">Foto</label>
                        <input name="oldfoto" id="exampleNama" type="hidden" class="form-control" value="<?=$foto_kegiatan?>">
                        <div class="col-sm-10"><input name="foto" id="exampleFile" type="file" class="form-control-file"
                                placeholder="ini nama file">
                            <span id="fotoname"></span>
                            <small class="form-text text-muted">Foto harus berupa <b>Format .JPG, .PNG atau .JPEG</b>.</small>
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