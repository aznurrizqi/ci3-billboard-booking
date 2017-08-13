<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Pemesan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nmpemesan</th>
		<th>Telpon</th>
		<th>Alamat</th>
		<th>Email</th>
		
            </tr><?php
            foreach ($pemesan_data as $pemesan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pemesan->nmpemesan ?></td>
		      <td><?php echo $pemesan->telpon ?></td>
		      <td><?php echo $pemesan->alamat ?></td>
		      <td><?php echo $pemesan->email ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>