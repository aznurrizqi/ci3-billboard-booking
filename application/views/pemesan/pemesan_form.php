<!doctype html>
<html>
    <head>
        <title>Tambah Pemesan</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <h2 style="margin-top:0px">Tambah Pemesan</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Pemesan <?php echo form_error('nmpemesan') ?></label>
            <input type="text" class="form-control" name="nmpemesan" id="nmpemesan" placeholder="Masukkan nama" value="<?php echo $nmpemesan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telpon <?php echo form_error('telpon') ?></label>
            <input type="text" class="form-control" name="telpon" id="telpon" placeholder="Masukkan no telpon" value="<?php echo $telpon; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Masukkan alamat"><?php echo $alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan email" value="<?php echo $email; ?>" />
        </div>
	    <input type="hidden" name="idpemesan" value="<?php echo $idpemesan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pemesan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>