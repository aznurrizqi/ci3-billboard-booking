<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <h2 style="margin-top:0px">Detail Area</h2>
        <table class="table">
	    <tr><td>Nama Area</td><td><?php echo $nmarea; ?></td></tr>
	    <tr><td>Harga Area</td><td><?php echo $hrgarea; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('area') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>