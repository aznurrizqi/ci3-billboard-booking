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
        <h2>Pemesanan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        <th>Kode Pemesanan</th>
		<th>Tglpemesanan</th>
		<th>Nmpemesan</th>
		<th>Totalbayar</th>
		
            </tr><?php
            foreach ($pemesanan_data as $pemesanan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
              <td><?php echo $pemesanan->kodepemesanan ?></td>
		      <td><?php echo $pemesanan->tglpemesanan ?></td>
		      <td><?php echo $pemesanan->nmpemesan ?></td>
		      <td><?php echo $pemesanan->totalbayar ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>