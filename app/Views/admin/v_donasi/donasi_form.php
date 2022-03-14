<div class="row">
    <div class="col-12">
        <div class="main-card mb-0 card ">
            <div class="card-header"><?=$title?></div>
            <div class="card-body" style="overflow: scroll;">
                <?php if (session()->getFlashdata('msg')): ?>
                <?=session()->getFlashdata('msg')?>
                <?php endif;?>
                <?php
                    $id_donasi          = '';
                    $id_user            = '';
                    $jumlah_donasi      = '';
                    $tanggal_pengajuan  = '';
                    $alamat_jemput      = '';
                    $lati               = '';
                    $longi              = '';
                    $id_kurir           = '';
                    $tanggal_diambil    = '';
                    $status_donasi      = '';
                    $form               = 'donasi/save';
                    // print_r($user);
                    if (!empty($donasi)) {
                        foreach ($donasi as $row):
                            $id_donasi          = $row['id_donasi'];
                            $id_user            = $row['id_user'];
                            $jumlah_donasi      = $row['jumlah_donasi'];
                            $tanggal_pengajuan  = $row['tanggal_pengajuan'];
                            $alamat_jemput      = $row['alamat_jemput'];
                            $lati               = $row['lati'];
                            $longi              = $row['longi'];
                            $id_kurir           = $row['id_kurir'];
                            $tanggal_diambil    = $row['tanggal_diambil'];
                            $status_donasi      = $row['status_donasi'];
                            $form               = 'donasi/update/' . $row['id_donasi'];
                        endforeach;
                    }
                    // echo $lati;
                ?>
                <form action="<?=site_url() . $form?>" method="post" enctype="multipart/form-data">
                    <div class="position-relative row form-group"><label for="exampleText"
                            class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelect"
                            class="col-sm-2 col-form-label">Nama Donatur</label>
                        <div class="col-sm-10"><select name="id_user" id="examplelevel" class="form-control"
                                placeholder="Pilih user...">
                                <option value="">pilih salah satu</option>
                                <?php $i = 1;foreach ($user as $l): ?>
                                <option <?php if ($l['id_user'] == $id_user) {echo 'selected';}?>
                                    value="<?=$l['id_user'];?>"><?=$l['nama'];?></option>
                                <?php $i++;endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleEmail"
                            class="col-sm-2 col-form-label">Permintaan Penjemputan</label>
                        <div class="col-sm-10">
                            <input name="tanggal_pengajuan" id="exampledatepicker" type="text" class="form-control"
                                value="<?=$tanggal_pengajuan?>">
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleEmail"
                            class="col-sm-2 col-form-label">Jumlah Donasi</label>
                        <div class="col-sm-10"><input name="jumlah_donasi" id="exampleNama" type="number"
                                class="form-control" value="<?=$jumlah_donasi?>">
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleText"
                            class="col-sm-2 col-form-label">Lokasi Penjemputan</label>
                        <div class="col-sm-10">
                                <div id="map"></div>
                            <input name="lati" id="lat" type="hidden" class="form-control" value="<?=$lat?>">
                            <input name="longi" id="long" type="hidden" class="form-control" value="<?=$long?>">
                            <br>
                            <?php if($alamat_jemput==''):?>
                            <textarea name="alamat_jemput" id="examplealamat" class="form-control autosize-input"
                                placeholder="Tambahkan detail alamat seperti warna rumah, acuan, dsb."></textarea>
                            <?php else:?>
                            <textarea name="alamat_jemput" id="examplealamat" class="form-control autosize-input"><?=$alamat_jemput?>
                                </textarea>
                            <?php endif;?>
                        </div>
                    </div>
                    <?php if ($status_donasi != '') :?>
                    <div class="position-relative row form-group"><label for="exampleSelect"
                            class="col-sm-2 col-form-label">Nama Kurir</label>
                        <div class="col-sm-10"><select name="id_kurir" id="examplelevel3" class="form-control"
                                placeholder="Pilih kurir...">
                                <option value="">pilih salah satu</option>
                                <?php $i = 1;foreach ($kurir as $l): ?>
                                <option <?php if ($l['id_kurir'] == $id_kurir) {echo 'selected';}?>
                                    value="<?=$l['id_kurir'];?>"><?=$l['nama'];?> - Kapasitas Sekarang: <?=$l['kapasitas_sekarang'];?></option>
                                <?php $i++;endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleEmail"
                            class="col-sm-2 col-form-label">Tanggal Diambil</label>
                        <div class="col-sm-10">
                            <input name="tanggal_diambil" id="exampledatepicker2" type="text" class="form-control"
                                value="<?=$tanggal_diambil?>">
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label for="exampleSelect"
                            class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10"><select name="status_donasi" id="examplelevel3" class="form-control"
                                placeholder="Pilih user...">
                                <option value="">-pilih salah satu-</option>
                                <option value="0" <?php if ($status_donasi == 0) {echo 'selected';}?>>Belum Diproses
                                </option>
                                <option value="1" <?php if ($status_donasi == 1) {echo 'selected';}?>>Diproses</option>
                                <option value="2" <?php if ($status_donasi == 2) {echo 'selected';}?>>Selesai</option>
                            </select>
                        </div>
                    </div>
                    <?php endif;?>
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

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
<script>
$(function () {
        // datetimepicker
        $("#exampledatepicker").flatpickr({
            "enableTime": true,
        });
        $("#exampledatepicker2").flatpickr({
            "enableTime": true,
            minDate: "today"
        });
        // map
        var map = L.map('map');
        var marker;

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a>Popokku</a>'
        }).addTo(map);

        watch: true;

        function onLocationFound(e) {
            marker = new L.Marker(e.latlng, {
                draggable: false
            }).bindPopup("Anda Berada di radius meters diarea ini").openPopup();
            map.addLayer(marker);

            $('#lat').val(e.latlng.lat);
            $('#long').val(e.latlng.lng);
        }

        function onMapClick(e) {
            map.removeLayer(marker);
            marker = new L.Marker(e.latlng, {
                draggable: false
            }).bindPopup("Anda Berada di radius meters diarea ini").openPopup();
            map.addLayer(marker);

            $('#lat').val(e.latlng.lat);
            $('#long').val(e.latlng.lng);
        }

        l1 = '';
        l1 = '<?=$lati;?>';
        if (l1=='') {
            map.on('locationfound', onLocationFound);
            map.locate({
                setView: true,
                maxZoom: 15
            });
            map.on('click', onMapClick);    
        } else {
            var lt = $('#lat').val();
            var lng = $('#long').val();
            marker = new L.Marker([<?=$lati;?>, <?=$longi;?>], 14, {
                draggable: false
            }).bindPopup("Anda Berada di radius meters diarea ini").openPopup();
            map.addLayer(marker);
            map.setView([<?=$lati;?>, <?=$longi;?>], 12);
  
        }

    });
</script>