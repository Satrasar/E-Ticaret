<?php ob_start()?> <!-- “Cannot modify header information – headers already sent by” hatası için bu çözümü kullandık -->
<?php include("../baglan.php"); ?>

<?php
require("ust_dash.php");?>


    <?php
require("sol_dash.php");?>

<?php

$id = $_GET["id"];

$v = $db->prepare("select * from  urunler  where urun_id=?");
$v->execute(array($id));
$m = $v->fetch(PDO::FETCH_ASSOC);
?>

<?php

if($_POST){

    $urun_baslik = $_POST["urun_baslik"];
    $urun_hakkinda = $_POST["urun_hakkinda"];
    $urun_stok = $_POST["urun_stok"];
    $urun_fiyat = $_POST["urun_fiyat"];
    $urun_resim = $_POST["urun_resim"];
    $urun_baslik = $_POST["urun_baslik"];
    $urun_durum = $_POST["urun_durum"];


    if(!$urun_baslik || !$urun_hakkinda || !$urun_stok || !$urun_fiyat || !$urun_resim ) {

        echo 'gerekli alanları doldurunuz!';
    }else{

        $guncelle = $db->prepare("UPDATE urunler SET

        urun_baslik = ?,
        urun_hakkinda = ?,
        urun_stok = ?,
        urun_fiyat = ?,
        urun_resim = ?,
        urun_durum = ? WHERE urun_id =?

        ");
        $update = $guncelle ->execute(array($urun_baslik, $urun_hakkinda, $urun_stok, $urun_fiyat, $urun_resim, $urun_durum, $id)) ;

        if($update){
            echo 'başarıyla kaydoldu';
            header("location:urunler.php");
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
                  <h4 class="card-title">ÜRÜN DÜZENLE</h4>

                  <form class="forms-sample" method="POST">
                    <div class="form-group">
                      <label for="exampleInputName1">Ürün Başlık</label>
                      <input type="text" name="urun_baslik" class="form-control" id="exampleInputName1" value="<?php echo $m['urun_baslik']?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Ürün Hakkında</label>
                      <textarea class="form-control"  name="urun_hakkinda" id="exampleTextarea1"  rows="4"> <?php echo $m['urun_hakkinda']?></textarea>
                    </div>



                    <div class="form-group">
                      <label for="exampleInputName1">Ürün Stok</label>
                      <input type="text" name="urun_stok" class="form-control" id="exampleInputName1" value="<?php echo $m['urun_stok']?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Ürün Fiyat</label>
                      <input type="text" name="urun_fiyat" class="form-control" id="exampleInputName1" value="<?php echo $m['urun_fiyat']?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Ürün Resim</label>
                      <input type="text" name="urun_resim" class="form-control" id="exampleInputName1"value="<?php echo $m['urun_resim']?>">
                    </div>

                    <div class="form-group">
                    <select class="form-select" name="urun_durum" id="" aria-label="Default select example">

                          <option value="1" <?php echo $m["urun_durum"] == 1 ? 'selected' : null; ?>> Aktif</option>
                          <option value="0" <?php echo $m["urun_durum"] == 0 ? 'selected' : null; ?>> Pasif </option>

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