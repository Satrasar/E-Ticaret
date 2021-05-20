<?php include("../baglan.php"); ?>

<?php
require("ust_dash.php");?>
    

    <?php
require("sol_dash.php");?>

<?php

$yorumsor = $db->prepare("SELECT * FROM yorumlar ");
$yorumsor->execute();

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
                            Yorum Ekleyen
                          </th>
                          <th>
                            Yorum Mesaj
                          </th>
                          <th>
                           Yorum Tarih
                          </th>
                          <th>
                           Yorum Onay
                          </th>
                         
                          
                        </tr>
                      </thead>


                      <tbody>
                        
                    <?php

                    while ($yorumcek = $yorumsor->fetch(PDO::FETCH_ASSOC)) { ?>

                      <tr>
                        <td>
                          <?php echo $yorumcek['yorum_id'] ?>
                        </td>
                        <td>
                          <?php echo $yorumcek['yorum_ekleyen'] ?>
                        </td>
                        <td>
                          <?php echo $yorumcek['yorum_mesaj'] ?>

                        </td>
                        <td>
                          <?php echo $yorumcek['yorum_tarih'] ?>
                        </td>
                        <td>
                          <?php echo $yorumcek['yorum_onay'] ?>
                        </td>
                       
                        <td>
                          <button type="button" class="btn btn-inverse-success btn-fw"> <a href="yorum_duzenle.php?&id=<?= $yorumcek["yorum_id"]?>">Düzenle</a></button>&nbsp;
                          <a href="../islem.php?yorum_id=<?= $yorumcek["yorum_id"] ?>&yorumsil=ok"><button type="button" class="btn btn-inverse-danger btn-fw">Sil</button>

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