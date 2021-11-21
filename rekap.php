<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="admin.php">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Rekap Pembayaran</li>
  </ol>
</nav>
<?php
$tgl = date("Y/m/d");
include 'koneksi.php';
if( isset( $_REQUEST['sub'] )){
  $sub = $_REQUEST['sub'];

  include "laporan_tagihan.php";
} else {

  if(isset($_REQUEST['submit'])){
   $submit = $_REQUEST['submit'];
   $tgl1 = $_REQUEST['tgl1'];
   $tgl2 = $_REQUEST['tgl2'];

         //echo $tgl1.'-'.$tgl2;
   $q = "SELECT kelas,sum(jumlah) FROM pembayaran WHERE tgl_bayar BETWEEN '$tgl1' AND '$tgl2' GROUP BY kelas";

 } else {
   $tgl = date("Y/m/d");
   $q = "SELECT kelas,sum(jumlah) FROM pembayaran WHERE tgl_bayar='$tgl' GROUP BY kelas";

 }

 $sql = mysqli_query($koneksi,$q);

}
?>
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Rekap Pembayaran <?php echo date('d/m/Y',strtotime($tgl));?></h4>
    <hr>
    <div class="template-demo">
      <div style="margin-left: 20%" class="row">
        <div class="col-md-12">
          <div class="well well-sm noprint">
            <form class="form-inline" role="form" method="post" action="">
              <div class="form-group">
                <label class="sr-only" for="tgl1">Mulai</label>
                <input type="date" class="form-control" id="tgl1" name="tgl1">
              </div>
              <div class="form-group">
                <label class="sr-only" for="tgl2">Hingga</label>
                <input type="date" class="form-control" id="tgl2" name="tgl2">
              </div>
              <button style="margin-left: 10px" type="submit" name="submit" class="btn btn-primary">Tampilkan</button>
            </form>
          </div>
        </div>

      </div>
      <div style="margin-top: 30px">
        <?php
        echo '<table class="table table-bordered">';
        echo '<tr class="info"><th width="50">No</th><th>Kelas</th><th>Jumlah</th></tr>';

        $total = 0;
        $no=1;
        while(list($kls,$jml) = mysqli_fetch_array($sql)){
         echo '<tr><td>'.$no.'</td><td>'.$kls.'</td><td><span class="pull-right">'.$jml.'</span></td></tr>';
         $total += $jml;
         $no++;
       }

       echo '<tr><td colspan="2"><span class="pull-right">Total</span></td><td><span class="pull-right">'.$total.'</span></td></tr>';
       echo '</table>';
       echo '</div></div>';

       ?>
     </div>
   </div>
 </div>
</div>