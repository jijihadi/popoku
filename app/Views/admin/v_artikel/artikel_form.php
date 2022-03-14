<div class="row">
    <div class="col-12">
        <div class="main-card mb-0 card ">
            <div class="card-header"><?=$title?></div>
            <div class="card-body" style="overflow: scroll;">
                <?php if (session()->getFlashdata('msg')): ?>
                <?=session()->getFlashdata('msg')?>
                <?php endif;?>
                <?php
                    $judul = '';
                    $headline = '';
                    $tanggal_rilis = '';
                    $isi = '';
                    $pp = '';
                    $form = 'artikel/save';
                    // print_r($user);
                    if (!empty($artikel)) {
                        foreach ($artikel as $row):
                            $judul = $row['judul'];
                            $headline = $row['headline'];
                            $tanggal_rilis = $row['tanggal_rilis'];
                            $isi = $row['isi'];
                            $pp = '<img src="'.site_url().'/assets/file_upload/artikel/'.$headline.'"  style="max-width:200px;">';
                            $form = 'artikel/update/' . $row['id_artikel'];
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
                            class="col-sm-2 col-form-label">Judul Artikel</label>
                        <div class="col-sm-10"><input name="judul" id="exampleNama" type="text"
                                class="form-control" style="text-transform:capitalize" value="<?=$judul?>">
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleArticle"
                            class="col-sm-2 col-form-label">Isi Berita</label>
                        <div class="col-sm-10"><textarea name="isi" id="exampleArticle"
                                class="form-control autosize-input"><?=$isi?></textarea>
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleFile"
                            class="col-sm-2 col-form-label">Foto Headline</label>
                        <input name="oldfoto" id="exampleNama" type="hidden" class="form-control" value="<?=$headline?>">
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