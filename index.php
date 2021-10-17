<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <?php
    include "koneksi.php";
    
    if( isset( $_REQUEST['submit'] ) ){
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        
        $sql = mysqli_query($koneksi,"SELECT iduser,username,admin,fullname FROM user WHERE username='$username' AND password=md5('$password')");
        
        if( mysqli_num_rows($sql) > 0 ){
            list($iduser,$username,$admin,$fullname) = mysqli_fetch_array($sql);
            
            //session_start();
            $_SESSION['iduser'] = $iduser;
            $_SESSION['username'] = $username;
            $_SESSION['admin'] = $admin;
            $_SESSION['fullname'] = $fullname;
            
            header("Location: ./admin.php");
            die();
        } else {
            //$err = '<strong>ERROR!</strong> Username dan Password tidak ditemukan.';
            //header('Location: ./?err='.urlencode($err));

            $_SESSION['err'] = '<strong>ERROR!</strong> Username dan Password tidak ditemukan.';
            header('Location: ./');
            die();
        }
        
    } else {
        ?>

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Aplikasi SPP Ukana</h1>
                                        </div>
                                        <form class="user" method="post" action="" role="form">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" name="username" aria-describedby="emailHelp"
                                                placeholder="Masukan Username Anda">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password"  class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Masukan Password Anda">
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                                </div>
                                            </div>
                                            <button name="submit" class="btn btn-primary btn-user btn-block" type="submit">Login</button>


                                        </form>
                                        <hr>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    <?php }?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>