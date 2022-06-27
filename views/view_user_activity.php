<!DOCTYPE html>
<html>

<head>
    <title>SIPERA</title>
    <link href="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
    <h1>DATA KEGIATAN</h1>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Kegiatan</th>
                <th>Nama Ruangan</th>
                <th>Tanggal</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Status</th>
                <th>Disetujui/Ditolak Oleh</th>
                <th>Catatan</th>
                <th>Barang Dipinjam</th>
                <th>Internet</th>
                <th>Pinjam Barang</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $n = 1;
            foreach ($activities as $activity) { ?>
                <tr>
                    <td><?= $n++ ?></td>
                    <td><?= $activity->event_name ?></td>
                    <td><?= $activity->room_name ?></td>
                    <td><?= $activity->date ?></td>
                    <td><?= $activity->start ?></td>
                    <td><?= $activity->end ?></td>
                    <td><?php if ($activity->status === 'pending') {
                            echo "Menunggu Konfirmasi";
                        } elseif ($activity->status === 'approved') {
                            echo "Disetujui";
                        } else {
                            echo "Ditolak";
                        } ?>
                    </td>
                    <td><?php if ($activity->status === 'pending') {
                            echo "-";
                        } else {
                            echo $activity->approver;
                        } ?>
                    </td>
                    </td>
                    <td><?= $activity->notes ?></td>
                    <td><a href="<?= base_url(); ?>activity/detail_activity_products/<?= $activity->event_id ?>">
                            <i class="fa fa-edit"> Lihat</i>
                        </a></td>
                    <td><?php if ($activity->with_internet === '1') {
                            echo "Ya";
                        } else {
                            echo "Tidak";
                        } ?></td>
                    <td>
                        <a href="<?= base_url(); ?>activity/add_activity_products/<?= $activity->event_id ?>">Tambah Barang</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <a href="<?= base_url('dashboard') ?>">Kembali Ke Dashboard</a>

</body>
<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
    function konfirmasi(id, name) {
        Swal.fire({
            title: 'Hapus Kegiatan?',
            text: name,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.value) {
                window.location = "<?php echo base_url(); ?>activity/delete/" + id;
            }
        })
    }
</script>
<?php echo $this->session->flashdata('pesan'); ?>

</html>