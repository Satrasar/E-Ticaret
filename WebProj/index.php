  <?php include("baglan.php"); ?>
  <?php session_start();
  ob_start();
  
  ?>

  <?php
  require_once('ust.php')
  ?>

  <div class="parallax">

    <?php
    require_once('header.php')
    ?>

    <div class="tanim">
      <h4></h4>
      <h1>PRODUCTS</h1>
    </div>

  </div>


 
  <?php

  $urun = $db->prepare("select * from urunler");
  $urun->execute(array());
  $x = $urun->fetchALL(PDO::FETCH_ASSOC);
  

  foreach ($x as $m) {
  ?>


    <div class="container">

      <!-- boşuk bırakmama yardım etti -->
      <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1567795542108_278025">
        <div class="sqs-block-content">
          <p class="" style="white-space:pre-wrap;"><br></p>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-2">
          <a href="detay.php?urun_id=<?= $m["urun_id"] ; ?>"> <img src="<?php echo $m["urun_resim"]; ?>" alt="Image" class="img-fluid tm-intro-img"> </a>
        </div>
        <div class="col-lg-10">
          <div class="tm-intro-text-container">
            <h3 class="display-6"><?php echo $m["urun_baslik"]; ?></h3>
            <hr>

            <p class="mb-2 tm-intro-text">
              <?php echo $m["urun_hakkinda"]; ?> </p>

            

            <div class="tm-next">
              <I> <b> Fiyat:<?php echo $m["urun_fiyat"]; ?>₺ </b> </I> &nbsp
              <!--&nbsp =boşluk oluşturmama yardım etti -->
            </div>
          
         
          </div>
        </div>
      </div>
    </div>

    <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1567795542108_278025">
      <div class="sqs-block-content">
        <p class="" style="white-space:pre-wrap;"><br></p>
      </div>
    </div>

    <?php
  }

  ?>








  <?php
  require_once('alt.php')
  ?>

  </body>

  </html>