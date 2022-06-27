<!DOCTYPE html>
<html>

<head>
    <title>SIPERA</title>
    <link href="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
    <h1>DATA BARANG</h1>
    <br>
    <a href="<?= base_url('product/add') ?>">Tambah Barang</a>
    <table border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $n = 1;
            foreach ($prod as $p) { ?>
                <tr>
                    <td><?= $n++ ?></td>
                    <td><?= $p->product_name ?></td>
                    <td><?= $p->stock ?></td>
                    <td>
                        <a href="<?= base_url(); ?>product/edit_product/<?= $p->id ?>">
                            <i class="fa fa-edit"> Edit</i>
                        </a>|
                        <a href="#<?= $p->id ?>" onclick="konfirmasi('<?= $p->id ?>','<?= $p->product_name ?>')">
                            <i class="fa fa-trash"> Hapus</i>
                        </a>
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
            title: 'Hapus Barang?',
            text: name,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.value) {
                window.location = "<?= base_url(); ?>product/delete/" + id;
            }
        })
    }
</script>
<?php echo $this->session->flashdata('message'); ?>

</html>