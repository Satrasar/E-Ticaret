
<?php include("baglan.php"); ?>

<?php
ob_start();
session_start();?>





<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/Projeler/WebProj/template/vendors/feather/feather.css">
  <link rel="stylesheet" href="/Projeler/WebProj/template/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="/Projeler/WebProj/template/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/Projeler/WebProj/template/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/Projeler/WebProj/template/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              
              <h4>Giriş yap</h4>
              <form class="pt-3" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name= "kullanici_ad " placeholder="Kullanıcı Adı">
                </div>
               
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="kullanici_password" placeholder="Şifre">
                </div>
                <div class="mb-4">
                  <div class="form-check"></div>
                </div>
                
                <button type="submit" name="kullanicigiris" class="btn btn-dark btn-lg btn-block">Giriş yap</button>
                
                
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
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="/Projeler/WebProj/template/js/off-canvas.js"></script>
  <script src="/Projeler/WebProj/template/js/hoverable-collapse.js"></script>
  <script src="/Projeler/WebProj/template/js/template.js"></script>
  <script src="/Projeler/WebProj/template/js/settings.js"></script>
  <script src="/Projeler/WebProj/template/js/todolist.js"></script>
  <!-- endinject -->
</body>


</html>
<!-- üye girisi-->
<?php






if(isset($_POST['kullanicigiris'])){
  if (!$kullanici_ad || !$kullanici_password ) {
      echo "<script type='text/javascript'>alert('Lütfen boş bırakmayınız!');</script>";
      header("Refresh: 0.1; url=../login_dash.php");
  } 
  else {
      $users=$db->prepare("SELECT * FROM kullanici WHERE kullanici_ad= :kullanici_ad AND kullanici_password= :kullanici_password");
      $users->execute(array(
          'kullanici_ad'=>$_POST['kullanici_ad'],
          'kullanici_password'=>$_POST['kullanici_password']
      ));
      $user_check = $users->fetch(PDO::FETCH_ASSOC);
      if ($user_check) {		   
          $_SESSION['kullanici_ad']=$_POST['kullanici_ad'];
          $_SESSION['kullanici_id']=$user_check['kullanici_id'];
          header("location:index.php"); 
      }
      else {
         echo "<script type='text/javascript'>alert('Kullanıcı Adı veya Şifre Hatalı!');</script>";
         header("Refresh: 0.1; url=../login_dash.php");
      }
  }
}
?>






