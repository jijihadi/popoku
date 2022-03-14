<table id="table1" class="table table-stripped dataTable dtr-inline">
    <thead>
        <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>Nama Kegiatan</th>
            <th>Lokasi</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($kegiatan as $row): ?>
        <tr>
            <td><b><?=$i;?></b></td>
            <td><?=tgl_indo(date('Y-m-d', strtotime($row['tanggal_kegiatan'])));?></td>
            <td><?=$row['nama_kegiatan'];?></td>
            <td><?=$row['lokasi_kegiatan'];?></td>
            <td><?=$row['deskripsi_kegiatan'];?></td>
        </tr>
        <?php $i++;endforeach;?>
    </tbody>
</table>