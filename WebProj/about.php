<?php include("baglan.php");?> 

<?php
require_once('ust.php')
?>



<div class="parallax_1">
     
        <?php 
        require_once('header.php')
        ?>

       <div class="tanim">
           <h4></h4>
    <h1>ABOUT</h1>
       </div>

    </div>


  <?php
  
  $hakkimizda = $db->prepare("select * from hakkimizda");
  $hakkimizda -> execute(array());
  $x = $hakkimizda ->fetchALL(PDO::FETCH_ASSOC);
   
    foreach($x as $m){

      ?>


<div class="container">
    
    <!-- boşuk bırakmama yardım etti --> <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1567795542108_278025"><div class="sqs-block-content"><p class="" style="white-space:pre-wrap;"><br></p></div></div>

     <div class="row">
       
       <div class="col-md-12">
         <div class="tm-intro-text-container">
             <h2 class="tm-text-primary mb-4 tm-section-title"><?php echo $m["hakkimizda_baslik"]; ?></h2> <hr>
             <p class="mb-8 tm-intro-text">
             <?php echo $m["hakkimizda_p1"]; ?>
           </p>
             <p class="mb-9 tm-intro-text">
             <?php echo $m["hakkimizda_p2"]; ?>
             </p>
             <div class="tm-next">

             <p class="mb-5 tm-intro-text">
             <?php echo $m["hakkimizda_p3"]; ?>
            
         </div>
       </div>
     </div>

   
    <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1567795542108_278025"><div class="sqs-block-content"><p class="" style="white-space:pre-wrap;"><br></p></div></div>

    <div class="row">
       <div class="col-lg-3">
         <img src=" <?php echo $m["hakkimizda_resim"]; ?>" alt="Image" class="img-fluid tm-intro-img">
       </div>
       <div class="col-lg-9">
         <div class="tm-intro-text-container">
             <p class="mb-4 tm-intro-text">
             <?php echo $m["hakkimizda_e1"]; ?>
           </p>
             <p class="mb-5 tm-intro-text">
             <?php echo $m["hakkimizda_e2"]; ?> </p>
             
         </div>
       </div>
     </div>
</div>
<div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1567795542108_278025"><div class="sqs-block-content"><p class="" style="white-space:pre-wrap;"><br></p></div></div>

    </div>


      <?php

    }
  
  ?>
  


  <?php 
require_once('footer.php')
?> 




<?php 
require_once('alt.php')
?>

    


