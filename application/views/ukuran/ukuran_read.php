<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Ukuran Read</h2>
        <table class="table">
	    <tr><td>Nmukuran</td><td><?php echo $nmukuran; ?></td></tr>
	    <tr><td>Hrgukuran</td><td><?php echo $hrgukuran; ?></td></tr>
	    <tr><td>Detailukuran</td><td><?php echo $detailukuran; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('ukuran') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>