<!doctype html>
<html>
    <head>
        <title>Detail Pemesan</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <h2 style="margin-top:0px">Detail Pemesan</h2>
        <table class="table">
	    <tr><td>Nama Pemesan</td><td><?php echo $nmpemesan; ?></td></tr>
	    <tr><td>Telpon</td><td><?php echo $telpon; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pemesan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>