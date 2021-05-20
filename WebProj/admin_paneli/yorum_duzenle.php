<?php ob_start()?> <!-- “Cannot modify header information – headers already sent by” hatası için bu çözümü kullandık -->
<?php include("../baglan.php"); ?>

<?php
require("ust_dash.php");?>


    <?php
require("sol_dash.php");?>

<?php

$id = $_GET["id"];

$v = $db->prepare("select * from  yorumlar where yorum_id=?");
$v->execute(array($id));
$m = $v->fetch(PDO::FETCH_ASSOC);
?>

<?php

if($_POST){

    $yorum_ekleyen = $_POST["yorum_ekleyen"];
    $yorum_mesaj = $_POST["yorum_mesaj"];
    $yorum_onay = $_POST["yorum_onay"];
   


    if(!$yorum_ekleyen || !$yorum_mesaj   ) {

        echo 'gerekli alanları doldurunuz!';
    }else{

        $guncelle = $db->prepare("UPDATE yorumlar SET

        yorum_ekleyen = ?,
        yorum_mesaj = ?,
        yorum_onay = ? WHERE yorum_id =?

        ");
        $update = $guncelle ->execute(array($yorum_ekleyen, $yorum_mesaj, $yorum_onay,$id)) ;

        if($update){
            echo 'başarıyla kaydoldu';
            header("location:yorum_liste.php");
        }else{
            echo 'hata oluştu';
        }
    }
}else{

    ?>

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">

                     <!-- your content goes here -->
                     <div class="card-body" >
                  <h4 class="card-title">YORUM DÜZENLE</h4>

                  <form class="forms-sample" method="POST">
                    <div class="form-group">
                      <label for="exampleInputName1">Yorum Ekleyen</label>
                      <input type="text" name="yorum_ekleyen" class="form-control" id="exampleInputName1" value="<?php echo $m['yorum_ekleyen']?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Yorum Mesaj</label>
                      <textarea class="form-control"  name="yorum_mesaj" id="exampleTextarea1"  rows="4"> <?php echo $m['yorum_mesaj']?></textarea>
                    </div>



                    <div class="form-group">
                      <label for="exampleInputName1">Yorum Tarih</label>
                      <input type="text" name="yorum_tarih" class="form-control" id="exampleInputName1" disabled value="<?php echo $m['yorum_tarih']?>">
                    </div>

                   
                    <div class="form-group">
                    <select class="form-select" name="yorum_onay" id="" aria-label="Default select example">

                          <option value="1" <?php echo $m["yorum_onay"] == 1 ? 'selected' : null; ?>> Aktif</option>
                          <option value="0" <?php echo $m["yorum_onay"] == 0 ? 'selected' : null; ?>> Pasif </option>

                    </select>
                    </div>


                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>

                     <!-- your content goes here -->
              </div>
            </div>
        </div>
      </div>
   </div>
 </div>


    <?php


}


?>












<?php
require("alt_dash.php");
?>