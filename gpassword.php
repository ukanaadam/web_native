<?php
include 'koneksi.php';
$id= $_SESSION['iduser'];
?>
<div class="row">
  <div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div
      class="card-header py-3 d-flex flex-row align-items-center justify-content-center ">
      <h6 style="text-align:center" class="m-0 font-weight-bold ">Ganti Password</h6>
    </div>
    <!-- Card Body -->
    <div style="margin-left: auto; margin-right: auto;" class="card-body">
      <form method="post">

        <input required="" class="form-control" type="password" placeholder="Password Lama" name="lama">
        <br>
        <input required=""  class="form-control"  type="password" placeholder="Password Baru" name="baru"> 
        <p style="margin-top: 10px">setelah menekan tombol "Simpan", anda akan diminta melakukan Login ulang.</p> 
        <button style="margin-top: 15px" name="simpan" class="btn btn-primary">Simpan</button>
      </form>
      <?php
      if (isset($_POST['simpan'])) 
      {
        $lama = md5($_POST['lama']);
        $baru = md5($_POST['baru']);
        $ambil = $koneksi->query("SELECT password FROM user WHERE iduser='$id' AND password='$lama'");
        $ada = $ambil->num_rows;
        if ($ada > 0) 
        {
         $koneksi->query("UPDATE user SET password='$baru' WHERE iduser='$id'");
         echo "<script>alert('Berhasil Mengubah password')</script>";
         echo "<script>location='admin.php?halaman=gpassword'</script>";
       }
       else
       {
        echo "password anda salah";
      }

    }

    ?>
  </div>
</div>
</div>
</div>