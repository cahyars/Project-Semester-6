<!DOCTYPE html>
<html>

<head>
    <title>SIPERA</title>
    <link href="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
    <h1>DATA RUANGAN</h1>
    <br>
    <a href="<?= base_url('room/add') ?>">Tambah Ruangan</a>
    <table border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Foto</th>
                <th>Nama Ruangan</th>
                <th>Deskripsi </th>
                <th>Opsi </th>
                <th>Pinjam </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $n = 1;
            foreach ($rooms as $room) { ?>
                <tr>
                    <td><?= $n++ ?></td>
                    <td><img src="<?= base_url() ?>assets/photo/<?= $room->photo ?>" witdh="200px" height="200px"></td>
                    <td><?= $room->room_name ?></td>
                    <td><?= $room->description ?></td>
                    <td>
                        <a href="<?= base_url(); ?>room/edit_room/<?= $room->id ?>">
                            <i class="fa fa-edit"> Edit</i>
                        </a>|
                        <a href="#<?= $room->id ?>" onclick="konfirmasi('<?= $room->id ?>','<?= $room->room_name ?>')">
                            <i class="fa fa-trash"> Hapus</i>
                        </a>
                    </td>
                    <td><a href="<?= base_url(); ?>activity/add/<?= $room->id ?>">Pinjam</a></td>
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
            title: 'Hapus Ruangan?',
            text: name,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.value) {
                window.location = "<?php echo base_url(); ?>room/delete/" + id;
            }
        })
    }
</script>
<?php echo $this->session->flashdata('pesan'); ?>

</html>