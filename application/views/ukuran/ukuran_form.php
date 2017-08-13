<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <h2 style="margin-top:0px">Tambah Ukuran</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Ukuran <?php echo form_error('nmukuran') ?></label>
            <input type="text" class="form-control" name="nmukuran" id="nmukuran" placeholder="Nmukuran" value="<?php echo $nmukuran; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Harga Ukuran <?php echo form_error('hrgukuran') ?></label>
            <input type="text" class="form-control" name="hrgukuran" id="hrgukuran" placeholder="Hrgukuran" value="<?php echo $hrgukuran; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Detail Ukuran <?php echo form_error('detailukuran') ?></label>
            <input type="text" class="form-control" name="detailukuran" id="detailukuran" placeholder="Detailukuran" value="<?php echo $detailukuran; ?>" />
        </div>
	    <input type="hidden" name="idukuran" value="<?php echo $idukuran; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('ukuran') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>