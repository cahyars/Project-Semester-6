<!DOCTYPE html>
<html>

<head>
    <title>SIPERA</title>
</head>

<body>
    <?php foreach ($activity as $act) { ?>
        <p><?= $act->product_name ?> : <?= $act->amount_of_products ?></p>
    <?php } ?>
    <br>
    <a href="<?= base_url('activity/user_activity') ?>">Kembali</a>
</body>
<?php echo $this->session->flashdata('pesan'); ?>

</html>