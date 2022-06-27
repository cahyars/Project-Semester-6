<!DOCTYPE html>
<html>

<head>
    <title>SIPERA</title>
    <link href="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
    <h1>Selamat datang di SIPERA</h1>
    <a href="<?= base_url('room') ?>">Lihat Data Ruangan</a>
    <br>
    <a href="<?= base_url('activity') ?>">Lihat Data Kegiatan</a>
    <br>
    <a href="<?= base_url('product') ?>">Lihat Data Barang</a>
    <br>
    <a href="<?= base_url('users') ?>">Lihat Data Pegawai</a>
    <?php
    $role  = $this->session->userdata('role');
    if ($role == "Admin") {
    ?>
        <p>Login sebagai admin</p>
    <?php } elseif ($role == "Petugas") {
    ?>
        <p>Login sebagai Petugas</p>
    <?php } elseif ($role == "Wakasek Sarpras") {
    ?>
        <p>Login sebagai Wakasek Sarpras</p>
    <?php } ?>

    <?php if (isset($_SESSION['username'])) : ?>
        <a href="#">
            Hi, <?= $_SESSION['username']; ?>
        </a>
        <br>
        <a href="#" onclick="logout()">Logout</a>
        </div>
        </li>
    <?php else : ?>
        <a href="<?= base_url() ?>login"></i> login</a>
        </li>
    <?php endif; ?>

</body>
<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
    function logout() {
        Swal.fire({
            title: 'Yakin untuk Logout?',
            text: "Silahkan klik Ya untuk melanjutkan",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Logout!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "<?= base_url() ?>index.php/login/logout";
            }
        })
    }
</script>
<?php echo $this->session->flashdata('pesan'); ?>

</html>