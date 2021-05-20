
<?php
ob_start();
session_start();?>


<?php include("../baglan.php"); ?>

<?php
require("ust_dash.php");?>
    

    <?php
require("sol_dash.php");?>

<?php
$kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_ad=:kadi"); 
$kullanicisor -> execute(array(
'kadi' => $_SESSION['kullanici_ad']

));
$say = $kullanicisor-> rowCount();
$kullanicicek = $kullanicisor->fetch(PDO:: FETCH_ASSOC);

if ($say == 0) {

  Header("Location:login_dash.php?durum=izinsiz");
  exit;
}


?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Hoşgeldin <?php echo $kullanicicek['kullanici_ad'] ?></h3>
                     <!-- your content goes here --> 
                     

                     <!-- your content goes here --> 
              </div>
            </div>
        </div>      
      </div>
   </div>
 </div>
  
<?php
require("alt_dash.php");
?>
