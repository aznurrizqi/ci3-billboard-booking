<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <h2 style="margin-top:0px">Jenis <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Jenis <?php echo form_error('nmjenis') ?></label>
            <input type="text" class="form-control" name="nmjenis" id="nmjenis" placeholder="Nmjenis" value="<?php echo $nmjenis; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Harga Jenis <?php echo form_error('hrgjenis') ?></label>
            <input type="text" class="form-control" name="hrgjenis" id="hrgjenis" placeholder="Hrgjenis" value="<?php echo $hrgjenis; ?>" />
        </div>
	    <input type="hidden" name="idjenis" value="<?php echo $idjenis; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenis') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>