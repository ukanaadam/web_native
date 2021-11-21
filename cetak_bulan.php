<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-with, initial-scale=1" >
  <meta name="description" content="">
  <meta name="author" content="">
  <title>
    SPP
  </title>

  <style>
    table, td, th {
      border: 1px solid black;
    }

    table {
      width: 80%;
      height: 200px;
      border-collapse: collapse;
    }
  </style>
</head>
<body>
  <div style="margin-top: 0px" class="container">


    <center><h3>Bukti pembayaran SPP</h3></center>

    <div class="row">
      <div class="col-sm-6">

        <center>
          <table cellpadding="6" cellspacing="8" class="table table-bordered">
            <tr >
              <td colspan="2">Nomor induk</td>
              <td colspan="3"> <?php echo $_GET['nis']?> </td>
            </tr>
            <tr>
              <td colspan="2">Nama SIswa </td>
              <td colspan="3"> <?php echo $_GET['nama']?></td>
            </tr>
            <tr class="info">
              <th width="50">#</th>
              <th width="100">Kelas</th>
              <th>Bulan</th>
              <th>Tanggal abayar</th>
              <th>Jumlah</th>
            </tr>
            <?php 
            include 'koneksi.php';
            $no=1;
            $ambil=$koneksi->query("SELECT * FROM pembayaran WHERE nis='$_GET[nis]'");
            while ($pecah=$ambil->fetch_assoc()) {?>
              <tr>
                <td><?php echo $no?></td>
                <td><?php echo $pecah['kelas'] ?></td>
                <td><?php echo $pecah['bulan'] ?></td>
                <td><?php echo $pecah['tgl_bayar'] ?></td>
                <td><?php echo $pecah['jumlah'] ?></td>
              </tr>
            <?php }?>


            </table>
          </center>

          <div style="margin-top: 50px">
            <a style="margin-left: 150px; " class=" btn btn-primary" onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> cetak</a>

          </div>
        </div>
      </div>



    </div>

  </body>
  </html>