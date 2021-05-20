<?php

ob_start();
session_start();
include("../baglan.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>

  <link rel="stylesheet" href="/Projeler/WebProj/template/css/vertical-layout-light/style.css">

</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h3>Giriş</h3>
              <form class="pt-3" action="../islem.php" method="POST">
                <div class="form-group">
                  <input type="text" name="kullanici_ad" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Kullanıcı Adı">
                </div>
                <div class="form-group">
                  <input type="password" name="kullanici_password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Şifre">
                </div>
                <div class="mt-3">
                  <button class="btn btn-dark btn-lg btn-block" type="submit" name="admingiris">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    
                   
                </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="/Projeler/WebProj/template/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->

</body>

</html>
