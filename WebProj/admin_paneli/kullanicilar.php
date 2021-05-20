<?php include("../baglan.php"); ?>

<?php
require("ust_dash.php"); ?>


<?php
require("sol_dash.php"); ?>

<?php

$kullanicisor = $db->prepare("SELECT * FROM kullanici ");
$kullanicisor->execute();

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
                        Kullanıcı Adı
                      </th>
                      <th>
                        Kayıt Tarihi
                      </th>
                      <th>
                        Kayıt Mail
                      </th>
                      <th>
                        İşlemler
                      </th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php

                    while ($kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC)) { ?>

                      <tr>
                        <td>
                          <?php echo $kullanicicek['kullanici_id'] ?>
                        </td>
                        <td>
                          <?php echo $kullanicicek['kullanici_ad'] ?>
                        </td>
                        <td>
                          <?php echo $kullanicicek['kullanici_zaman'] ?>

                        </td>
                        <td>
                          <?php echo $kullanicicek['kullanici_mail'] ?>
                        </td>
                        <td>
                          <button type="button" class="btn btn-inverse-success btn-fw" data-toggle="modal" data-target="#KullaniciDuzenle<?= $kullanicicek["kullanici_id"] ?>">Düzenle</button>&nbsp;
                          <a href="../islem.php?kullanici_id=<?= $kullanicicek["kullanici_id"] ?>&kullanicisil=ok"><button type="button" class="btn btn-inverse-danger btn-fw">Sil</button>

                        </td>
                      </tr>


                      <!-- Kullanıcı Düzenle Modal Başlangıç -->
                      <div class="modal fade" id="KullaniciDuzenle<?= $kullanicicek["kullanici_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            
                            <div class="modal-body">
                             <form action="kullanici_duzenle.php?kullanici_id=<?= $kullanicicek["kullanici_id"] ?>" method="POST">
                        <div class="form-group">
                          <label>Kullanıcı id</label>
                          <input type="text" class="form-control" value="<?php echo $kullanicicek["kullanici_id"]; ?>" disabled name="kullanici_id">
                          
                        <br>

                        <label>Kullanıcı Adi</label>
                          <input type="text" class="form-control" value="<?php echo $kullanicicek["kullanici_ad"]; ?>" name="kullanici_ad">
                          
                        <br>

                        <label>Kullanıcı Mail</label>
                          <input type="text" class="form-control" value="<?php echo $kullanicicek["kullanici_mail"]; ?>" name="kullanici_mail">
                          
                        
                         
                       
                        
                        <div class="modal-footer">
                              
                          <a href="kullanici_duzenle.php?kullanici_id=<?= $kullanicicek["kullanici_id"] ?>"> <button type="submit" class="btn btn-dark">Güncelle </button></a>
                            </div>
                          </div>
                      </form> 
                            </div>
                          </div>
                        </div>
                    </div>

                      <!-- Kullanıcı Düzenle Modal Bitiş-->


                    <?php }


                    ?>


                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>





<?php
require("alt_dash.php");
?>