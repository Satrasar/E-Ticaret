<?php include("../baglan.php"); ?>

<?php
require("ust_dash.php");?>
    

    <?php
require("sol_dash.php");?>

<?php

$siparissor = $db->prepare("SELECT * FROM siparis_teslim ");
$siparissor->execute();

?>
<!-- your content goes here --> 


<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                 
                     <!-- your content goes here --> 
                     <div class="card-body">
                 
                  <div class="table-responsive pt-3">
                    <table class="table table-dark">
                      <thead>
                        <tr>
                         
                          <th>
                            Sipariş id
                          </th>
                          <th>
                            Sipariş Zaman 
                          </th>
                          <th>
                           Kullanıcı İd
                          </th>
                          <th>
                           Sipariş Toplam
                          </th>
                          <th>
                           Sipariş Ödeme Tipi
                          </th>
                         
                          
                        </tr>
                      </thead>


                      <tbody>
                        
                    <?php

                    while ($sipariscek = $siparissor->fetch(PDO::FETCH_ASSOC)) { ?>

                      <tr>
                        <td>
                          <?php echo $sipariscek['siparis_id'] ?>
                        </td>
                        <td>
                          <?php echo $sipariscek['siparis_zaman'] ?>
                        </td>
                        <td>
                          <?php echo $sipariscek['kullanici_id'] ?>

                        </td>
                        <td>
                          <?php echo $sipariscek['siparis_toplam'] ?>
                        </td>
                        <td>
                          <?php echo $sipariscek['siparis_tip'] ?>
                        </td>
                       
                        <td>

                       
                         

                        </td>
                      </tr>
                    
                    
                    
                    
                      <?php }


                     ?>




                      </tbody>
                    </table>
                  </div>
                </div>
                 
                
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