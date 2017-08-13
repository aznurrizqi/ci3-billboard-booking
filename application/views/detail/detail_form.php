<!doctype html>
<html>
    <head>
        <title>Detail Reklame</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <h2 style="margin-top:0px">Tambah Detail Pemesanan</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Kode Pemesanan <?php echo form_error('kodepemesanan') ?></label>
            <input type="text" class="form-control" name="kodepemesanan" id="kodepemesanan" placeholder="kodepemesanan" value="<?php echo $kodepemesanan; ?>" readonly/>
        </div>
        <div class="form-group">
            <label for="varchar">Reklame <?php echo form_error('reklame') ?></label>
            <?php
                $dd_reklame_attribute = 'class="form-control select2"';
                echo form_dropdown('reklame', $reklame, $reklame_selected, $dd_reklame_attribute);
            ?>
        </div>
        <div class="form-group">
            <label for="int">Jangka Waktu (dalam Bulan)<?php echo form_error('jangkawaktu') ?></label>
            <br/>
            <input id="jangkawaktu" name="jangkawaktu" type="radio" class="" <?php if($jangkawaktu=='1') echo "checked='checked'"; ?> value="1" <?php echo $this->form_validation->set_radio('jangkawaktu', 1); ?> />
                <label for="jangkawaktu" class="">1 Bulan</label>
            <input id="jangkawaktu" name="jangkawaktu" type="radio" class="" <?php if($jangkawaktu=='3') echo "checked='checked'"; ?> value="3" <?php echo $this->form_validation->set_radio('jangkawaktu', 3); ?> />
                <label for="jangkawaktu" class="">3 Bulan</label>
            <input id="jangkawaktu" name="jangkawaktu" type="radio" class="" <?php if($jangkawaktu=='6') echo "checked='checked'"; ?> value="6" <?php echo $this->form_validation->set_radio('jangkawaktu', 6); ?> />
                <label for="jangkawaktu" class="">6 Bulan</label>
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" name="hrgdetail" id="hrgdetail" placeholder="hrgdetail" value="<?php echo $hrgdetail; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Pasang <?php echo form_error('tglpasang') ?></label>
            <input type="date" class="form-control" name="tglpasang" id="tglpasang" placeholder="Tglpasang" value="<?php echo $tglpasang; ?>" min="<?php echo date("Y-m-d") ?>"/>
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" name="tgllepas" id="tgllepas" placeholder="tgllepas" value="<?php echo $tgllepas; ?>" />
        </div>
	    <input type="hidden" name="iddetail" value="<?php echo $iddetail; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="javascript:window.history.go(-1);" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>