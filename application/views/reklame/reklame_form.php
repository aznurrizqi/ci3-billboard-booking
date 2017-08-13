<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <h2 style="margin-top:0px">Tambah Reklame</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Jenis <?php echo form_error('jenis') ?></label>
           <?php
                $dd_jenis_attribute = 'class="form-control select2"';
                echo form_dropdown('jenis', $jenis, $jenis_selected, $dd_jenis_attribute);
            ?>
        </div>
	    <div class="form-group">
            <label for="varchar">Area <?php echo form_error('area') ?></label>
           <?php
                $dd_area_attribute = 'class="form-control select2"';
                echo form_dropdown('area', $area, $area_selected, $dd_area_attribute);
            ?>
        </div>
	    <div class="form-group">
            <label for="varchar">Ukuran <?php echo form_error('ukuran') ?></label>
           <?php
                $dd_ukuran_attribute = 'class="form-control select2"';
                echo form_dropdown('ukuran', $ukuran, $ukuran_selected, $dd_ukuran_attribute);
            ?>
        </div>
	    <div class="form-group">
            <input type="hidden" class="form-control" name="hrg" id="hrg" placeholder="Hrg" value="<?php echo $hrg; ?>" />
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <input type="hidden" name="idreklame" value="<?php echo $idreklame; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('reklame') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>