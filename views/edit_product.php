<!DOCTYPE html>
<html>

<head>
    <title>SIPERA</title>
</head>

<body>
    <h1>Form Ubah Barang</h1>
    <form action="<?= base_url('product/add_process') ?>" method="POST">
        <label for="name">Nama Barang : </label><input type="text" name="name" id="username" value="<?= $prod->product_name ?>">
        <br>
        <label for="Stok">Stok : </label><input type="number" name="stock" value="<?= $prod->stock ?>">
        <br>
        <button type="submit">Update</button>
        <br>
        <a href="<?= base_url('product') ?>">Kembali</a>
    </form>
</body>
<?php echo $this->session->flashdata('pesan'); ?>

</html>