<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
    </head>
    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Daftar Ukuran</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('ukuran/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('ukuran/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('ukuran/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nama Ukuran</th>
		    <th>Harga Ukuran</th>
		    <th>Detail Ukuran</th>
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($ukuran_data as $ukuran)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $ukuran->nmukuran ?></td>
		    <td><?php echo $ukuran->hrgukuran ?></td>
		    <td><?php echo $ukuran->detailukuran ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('ukuran/read/'.$ukuran->idukuran),'Read'); 
			echo ' | '; 
			echo anchor(site_url('ukuran/update/'.$ukuran->idukuran),'Update'); 
			echo ' | '; 
			echo anchor(site_url('ukuran/delete/'.$ukuran->idukuran),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
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