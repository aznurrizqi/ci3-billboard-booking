<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <h2 style="margin-top:0px">Tambah Area</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Area <?php echo form_error('nmarea') ?></label>
            <input type="text" class="form-control" name="nmarea" id="nmarea" placeholder="Masukkan nama area" value="<?php echo $nmarea; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Harga Area <?php echo form_error('hrgarea') ?></label>
            <input type="text" class="form-control" name="hrgarea" id="hrgarea" placeholder="Masukkan harga" value="<?php echo $hrgarea; ?>" />
        </div>
	    <input type="hidden" name="idarea" value="<?php echo $idarea; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('area') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>