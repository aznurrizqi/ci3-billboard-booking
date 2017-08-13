<!doctype html>
<html>
    <head>
        <title>Detail Reklame</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <h2 style="margin-top:0px">Detail</h2>
        <table class="table">
	    <tr><td>Kode Pemesanan</td><td><?php echo $kodepemesanan; ?></td></tr>
	    <tr><td>Reklame</td><td><?php echo $reklame; ?></td></tr>
        <tr><td>Jangka Waktu</td><td><?php echo $jangkawaktu; ?></td></tr>
        <tr><td>Harga</td><td><?php echo $hrgdetail; ?></td></tr>
	    <tr><td>Tanggal Pasang</td><td><?php echo $tglpasang; ?></td></tr>
	    <tr><td>Tanggal Lepas</td><td><?php echo $tgllepas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('detail') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>