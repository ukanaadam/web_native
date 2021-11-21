<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
    </ol>
</nav>
<div class="card">
    <div class="card-header">
        <strong class="card-title">Laporan Tagihan</strong>
    </div>
    <div class="card-body">
      <a style="margin-bottom: 20px" onclick="window.print()" href="" target="_blank" class="btn btn-outline-primary btn-xs"><i style="margin-right=20px "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
          <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
          <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
          </svg></i> cetak semua</a> <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">bulan</th>
                    <th scope="col">jumlah</th>


                </tr>
            </thead>
            <?php
            include 'koneksi.php';
            $sql = mysqli_query($koneksi,"SELECT s.nis,s.nama,k.kelas,p.bulan,p.jumlah FROM (siswa s INNER JOIN kelas k ON s.nis = k.nis) LEFT JOIN pembayaran p ON s.nis = p.nis ORDER BY k.kelas, s.nis");?>
            <tbody>
             <?php   

             $no=1;
             while(list($nis,$nama,$kls,$bln,$jml)=mysqli_fetch_array($sql)){?>
                <tr>
                    <th scope="row"><?php echo $no?></th>
                    <td><?php echo $nis?></td>

                    <td><?php echo $nama?></td>
                    <td><?php echo $kls?></td>
                    <?php
                    if(empty($bln) AND empty($jml)){
                       echo '<td>--</td><td>BL</td></tr>';
                   } else {
                      echo '<td>'.$bln.'</td><td>LUNAS</td></tr>';
                  }
                  ?>
              </tr>
              <?php $no++?>
          <?php }?>
      </tbody>
  </table>
</div>
</div>


