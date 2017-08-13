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
        <h2>Ukuran List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nmukuran</th>
		<th>Hrgukuran</th>
		<th>Detailukuran</th>
		
            </tr><?php
            foreach ($ukuran_data as $ukuran)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $ukuran->nmukuran ?></td>
		      <td><?php echo $ukuran->hrgukuran ?></td>
		      <td><?php echo $ukuran->detailukuran ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>