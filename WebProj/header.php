<?php include("baglan.php"); ?>
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php
if($_SESSION){

    ?>
    


<div class="navbar">
            <div class="logo"><img src="logo.png"> </div>
        <div class="menu">
           <ul>
           <li><a href="index.php"> Products </a></li>
               
           <li><a href="about.php"> About </a></li>
               
               <li><a href="sepet.php"> Shoping Card</a></li>
               <li><a href="siparislerim.php"> My Orders</a></li>
               <li><a href="cikis.php"> Sign Out </a></li>
           <?php
           if ($_SESSION['kullanici_yetki'] == 1){

  echo ' <li><a href="admin_paneli/dashboard.php"> Dashboard </a></li> </a></li>';
              }
             ?>
              
           

           </ul>
        </div>
     </div>


    <?php

}else{
  
    ?>
    <div class="navbar">
            <div class="logo"><img src="logo.png"> </div>
        <div class="menu">
           <ul>
               <li><a href="index.php"> Products </a></li>
               <li><a href="about.php"> About </a></li>
               <li><a href="kullanici_kayit.php"> Sign In/Register </a></li>
               

           </ul>
        </div>
     </div>
    
    <?php
 
     }




?>


