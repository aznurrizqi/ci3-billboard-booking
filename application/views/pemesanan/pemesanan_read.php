<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <h2 style="margin-top:0px">Detail Pemesanan</h2>
        <table class="table">
        <tr><td>Kode Pemesanan</td><td><?php echo $kodepemesanan; ?></td></tr>
	    <tr><td>Tanggal Pemesanan</td><td><?php echo $tglpemesanan; ?></td></tr>
	    <tr><td>Nama Pemesan</td><td><?php echo $pemesan; ?></td></tr>
	    <tr><td>Total Bayar</td><td><?php echo $totalbayar; ?></td></tr>

    <br/>
    <br/>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Detail List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
            <th>Kode Pemesanan</th>
            <th>Reklame</th>
            <th>Jangka Waktu</th>
            <th>Harga</th>
            <th>Tanggal Pasang</th>
            <th>Tanggal Lepas</th>
                </tr>
            </thead>
        <tbody>
            <?php
            $start = 0;
            foreach ($detail_data as $detail)
            {
                ?>
                <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $detail->kodepemesanan ?></td>
            <td><?php echo $detail->nmjenis." | ".$detail->nmarea." | ".$detail->nmukuran." | ".$detail->hrg ?></td>
            <td><?php echo $detail->jangkawaktu ?></td>
            <td><?php echo $detail->hrgdetail ?></td>
            <td><?php echo $detail->tglpasang ?></td>
            <td><?php echo $detail->tgllepas ?></td>
            </tr>
                <?php
            }
            ?>
            </tbody>
        </table>


	    <tr><td></td><td><a href="<?php echo site_url('pemesanan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>