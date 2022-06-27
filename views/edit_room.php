<!DOCTYPE html>
<html>

<head>
    <title>SIPERA</title>
</head>

<body>
    <h1>Form Ubah Ruangan</h1>
    <form action="<?= base_url() ?>room/edit_process/<?= $this->uri->segment('3') ?>" method="POST" enctype="multipart/form-data">
        <label for="photo">Foto : </label><input type="file" name="photo" id="username">
        <?php if (!empty($room->photo)) { ?>
            <img src="<?= base_url() ?>assets/photo/<?php echo $room->photo ?>" witdh="200px" height="200px" class="img-rounded shadow">
        <?php } else { ?>
            <div class="card shadow bg-light">Belum ada Foto</div>
        <?php } ?>
        <br>
        <label for="name">Nama Ruangan : </label><input type="text" name="name" id="username" value="<?= $room->room_name ?>">
        <br>
        <label for="description">Deskripsi Ruangan : </label><textarea name="description" id="description" cols="30" rows="10"><?= $room->description ?></textarea>
        <br>
        <button type="submit">Update</button>
        <br>
        <a href="<?= base_url('room') ?>">Kembali</a>
    </form>
</body>
<?php echo $this->session->flashdata('pesan'); ?>

</html>