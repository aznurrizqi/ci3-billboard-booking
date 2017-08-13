<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <h2 style="margin-top:0px">Tambah Pemesanan</h2>
        <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Kode Pemesanan <?php echo form_error('kodepemesanan') ?></label>
            <input type="text" class="form-control" name="kodepemesanan" id="kodepemesanan" placeholder="kodepemesanan" value="<?php echo $kodepemesanan; ?>" readonly/>
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Pemesanan <?php echo form_error('tglpemesanan') ?></label>
            <input type="text" class="form-control" name="tglpemesanan" id="tglpemesanan" placeholder="tglpemesanan" value="<?php echo $tglpemesanan; ?>" readonly/>
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Pemesan <?php echo form_error('nmpemesan') ?></label>
           <?php
                $dd_pemesan_attribute = 'class="form-control select2"';
                echo form_dropdown('pemesan', $pemesan, $pemesan_selected, $dd_pemesan_attribute);
            ?>
        </div>

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
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('detail/create'), 'Create', 'class="btn btn-primary"'); ?>
        <?php echo anchor(site_url('detail/excel'), 'Excel', 'class="btn btn-primary"'); ?>
        <?php echo anchor(site_url('detail/word'), 'Word', 'class="btn btn-primary"'); ?>
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
            <th>Aksi</th>
                </tr>
            </thead>
        <tbody>
            <?php
            $start = 0;
            $total_sum=0;
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

            <?php $total_sum+=$detail->hrgdetail; ?>
            
            <td style="text-align:center" width="200px">
            <?php 
            echo anchor(site_url('detail/read/'.$detail->iddetail),'Read'); 
            echo ' | '; 
            echo anchor(site_url('detail/update/'.$detail->iddetail),'Update'); 
            echo ' | '; 
            echo anchor(site_url('detail/delete/'.$detail->iddetail),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
            ?>
            </td>
            </tr>
                <?php
            }
            ?>
            </tbody>
        </table>


        <div class="form-group">
            <label for="int">Total Bayar <?php echo form_error('totalbayar') ?></label>
            <input type="text" class="form-control" name="totalbayar" id="totalbayar" placeholder="Totalbayar" value="<?php echo $total_sum; ?>" readonly/>
        </div>

        <input type="hidden" name="idpemesanan" value="<?php echo $idpemesanan; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('pemesanan') ?>" class="btn btn-default">Cancel</a>
    </form>

        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>




    </body>
</html>