<table id="table1" class="table table-stripped dataTable dtr-inline">
    <thead>
        <tr>
            <th>#</th>
            <th>Permintaan Penjemputan</th>
            <th>Nama Donatur</th>
            <th>Jumlah Donasi</th>
            <th>Alamat Penjemputan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($laporan as $row): ?>
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
        </tr>
        <?php $i++;endforeach;?>
    </tbody>
</table>