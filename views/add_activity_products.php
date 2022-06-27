<!DOCTYPE html>
<html>

<head>
    <title>SIPERA</title>
</head>

<body>
    <h1>Permintaan Barang</h1>
    <form action="<?= base_url('activity/process_add_activity_products/') ?><?= $this->uri->segment(3) ?>" method="POST">
        <input type="hidden" name="event_id" id="event_id" value="<?= $this->uri->segment(3) ?>">

        <?php foreach ($activity_prod as $prod) { ?>
            <div>
                <input type="radio" id="product" name="product" value="<?= $prod->id ?>">
                <label for="product"><?= $prod->product_name ?></label><br>
            </div>
        <?php } ?>
        <?php print_r($activity_prod) ?>
        <br>
        <input type="number" min="1" name="amount">
        <br>
        <button type="submit" name="save">Tambah</button>
        <br>
        <a href="<?= base_url('activity/user_activity') ?>">Kembali</a>
    </form>
</body>
<?php echo $this->session->flashdata('pesan'); ?>

</html>