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
                <h2 style="margin-top:0px">Daftar Reklame</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('reklame/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('reklame/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('reklame/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Jenis</th>
		    <th>Area</th>
		    <th>Ukuran</th>
		    <th>Harga</th>
		    <th>Status</th>
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($reklame_data as $reklame)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $reklame->nmjenis ?></td>
		    <td><?php echo $reklame->nmarea ?></td>
		    <td><?php echo $reklame->nmukuran ?></td>
		    <td><?php echo $reklame->hrg ?></td>
		    <td><?php echo $reklame->status ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('reklame/read/'.$reklame->idreklame),'Read'); 
			echo ' | '; 
			echo anchor(site_url('reklame/update/'.$reklame->idreklame),'Update'); 
			echo ' | '; 
			echo anchor(site_url('reklame/delete/'.$reklame->idreklame),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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