<!doctype html>
<html>
    <head>
        <title>Detail Reklame</title>
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
        <h2>Detail List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Idpemesanan</th>
		<th>Reklame</th>
        <th>Jangka Waktu</th>
        <th>Harga</th>
		<th>Tglpasang</th>
		<th>Tgllepas</th>
		
            </tr><?php
            foreach ($detail_data as $detail)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $detail->idpemesanan ?></td>
		      <td><?php echo $detail->reklame ?></td>
              <td><?php echo $detail->jangkawaktu ?></td>
              <td><?php echo $detail->hrgdetail ?></td>
		      <td><?php echo $detail->tglpasang ?></td>
		      <td><?php echo $detail->tgllepas ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>