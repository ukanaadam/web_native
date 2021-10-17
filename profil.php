
<div class="row">
        <div class="col-xl-8 m-auto order-xl-2 mb-5 mb-xl-0">
          <div  class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div style="margin-top: 40px" class="card-profile-image">
                  <center>
                    
                    <img style="word-wrap: break-word;" height="200" src="img/undraw_profile.svg" class="rounded-circle">
                  
                  </center>
                </div>
              </div>
            </div>
            
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    
                    
                    
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  <?php echo $_SESSION['fullname']?>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>
                  <?php if ($_SESSION['admin']==1) 
                  {
                    echo "Admin";
                  }
                  else
                  {
                    echo "siswa";
                  }
                  ?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Rekayasa Perangkat Lunak
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>SMK NEGERI 1 Kepanjen
                </div>
               
                
              </div>
            </div>
          </div>
        </div>
      </div>