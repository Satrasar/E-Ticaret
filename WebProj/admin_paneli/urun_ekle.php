<?php include("../baglan.php"); ?>

<?php
require("ust_dash.php");?>
    

    <?php
require("sol_dash.php");?>


<!-- your content goes here --> 

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                 
                     <!-- your content goes here --> 
                     <div class="card-body">
                  <h4 class="card-title">ÜRÜN EKLE</h4>
                 
                  <form class="forms-sample" method="post" action="../islem.php">
                    <div class="form-group">
                      <label for="exampleInputName1">Ürün Başlık</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="urun_baslik" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Ürün Fiyat</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="urun_fiyat" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Ürün Stok</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="urun_stok" >
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Ürün Resim</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="urun_resim" >
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Ürün Hakkında</label>
                      <textarea class="form-control"  id="exampleTextarea1" name="urun_hakkinda" rows="4"></textarea>
                    </div>
                    <button type="submit" name="urun_ekle"class="btn btn-primary mr-2">Submit</button>
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
require("alt_dash.php");
?>