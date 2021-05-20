<?php include("../baglan.php"); ?>

<?php
require("ust_dash.php");?>
    

    <?php
require("sol_dash.php");?>

<?php

$urunsor = $db->prepare("SELECT * FROM urunler ");
$urunsor->execute();

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
                            #
                          </th>
                          <th>
                            Ürün Başlık
                          </th>
                          <th>
                            Ürün Hakkında
                          </th>
                          <th>
                           Ürün Stok
                          </th>
                          <th>
                           Ürün Fiyat
                          </th>
                          <th>
                           Ürün Resim
                          </th>
                          <th>
                           Ürün Durum
                          </th>
                          
                        </tr>
                      </thead>


                      <tbody>
                        
                    <?php

                    while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) { ?>

                      <tr>
                        <td>
                          <?php echo $uruncek['urun_id'] ?>
                        </td>
                        <td>
                          <?php echo $uruncek['urun_baslik'] ?>
                        </td>
                        <td>
                          <?php echo $uruncek['urun_hakkinda'] ?>

                        </td>
                        <td>
                          <?php echo $uruncek['urun_stok'] ?>
                        </td>
                        <td>
                          <?php echo $uruncek['urun_fiyat'] ?>
                        </td>
                        <td>
                          <?php echo $uruncek['urun_resim'] ?>
                        </td>
                        <td>
                        <?php echo $uruncek['urun_durum'] ?>
                        </td>
                        <td>
                          <button type="button" class="btn btn-inverse-success btn-fw"> <a href="urun_duzenle.php?&id=<?= $uruncek["urun_id"]?>">Düzenle</a></button>&nbsp;
                          <a href="../islem.php?urun_id=<?= $uruncek["urun_id"] ?>&urunsil=ok"><button type="button" class="btn btn-inverse-danger btn-fw">Sil</button>

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