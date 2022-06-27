<!DOCTYPE html>
<html>

<head>
    <title>SIPERA</title>
</head>

<body>
    <h1>Form Tambah Ruangan</h1>
    <form action="<?= base_url('room/add_process') ?>" method="POST" enctype="multipart/form-data">
        <label for="photo">Foto : </label><input type="file" name="photo" id="username">
        <br>
        <label for="name">Nama Ruangan : </label><input type="text" name="name" id="username" placeholder="Nama Ruangan">
        <br>
        <label for="description">Deskripsi Ruangan : </label><textarea name="description" id="description" cols="30" rows="10"></textarea>
        <br>
        <button type="submit">Tambah</button>
        <br>
        <a href="<?= base_url('room') ?>">Kembali</a>
    </form>
</body>
<?php echo $this->session->flashdata('pesan'); ?>

</html>