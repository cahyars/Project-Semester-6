<!DOCTYPE html>
<html>

<head>
    <title>SIPERA</title>
</head>

<body>
    <h1>Form Tambah Aktivitas</h1>
    <form action="<?= base_url('activity/add_process') ?>" method="POST">
        <label for="user">Peminjam :</label>
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
        <input type="text" readonly name="user_name" id="user" value="<?php echo $_SESSION['name']; ?>">
        <br>
        <label for="name">Nama Kegiatan : </label><input type="text" name="event_name" id="event_name">
        <br>
        <label for="date">Tanggal :</label><input type="date" name="date">
        <br>
        <label for="start">Jam Mulai :</label><input type="time" name="start">
        <label for="end">Jam Selesai :</label><input type="time" name="end">
        <br>
        <label for="description">Deskripsi Kegiatan : </label><textarea name="description" id="description" cols="30" rows="10"></textarea>
        <br>
        <input type="hidden" name="room_id" id="room_id" value="<?= $this->uri->segment(3); ?>">
        <br>
        <label for="name">Butuh Internet : </label>
        <select name="with_internet" id="internet">
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
        </select>
        <br>
        <input type="hidden" name="user" value="">

        <button type="submit">Tambah</button>
        <br>
    </form>
    <a href="<?= base_url('room') ?>">Kembali</a>
</body>
<?php echo $this->session->flashdata('pesan'); ?>

</html>