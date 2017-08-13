<!doctype html>
<html>
    <head>
        <title>Daftar Pemesan</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
    </head>
    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Daftar Pemesan</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('pemesan/create'), 'Create', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('pemesan/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('pemesan/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nama Pemesan</th>
		    <th>Telpon</th>
		    <th>Alamat</th>
		    <th>Email</th>
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($pemesan_data as $pemesan)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $pemesan->nmpemesan ?></td>
		    <td><?php echo $pemesan->telpon ?></td>
		    <td><?php echo $pemesan->alamat ?></td>
		    <td><?php echo $pemesan->email ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('pemesan/read/'.$pemesan->idpemesan),'Read'); 
			echo ' | '; 
			echo anchor(site_url('pemesan/update/'.$pemesan->idpemesan),'Update'); 
			echo ' | '; 
			echo anchor(site_url('pemesan/delete/'.$pemesan->idpemesan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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