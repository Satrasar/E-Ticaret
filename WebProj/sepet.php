<?php include("baglan.php");?>

<?php
require_once('ust.php')
?>
<?php
 require_once('header.php')
 ?>
<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
?>





<?php
$kullanici_id = $_SESSION['kullanici_id'];
$kullanicisor = $db->prepare("select * from kullanici WHERE kullanici_id= :kullanici_id");
$kullanicisor->execute(array('kullanici_id' => $_SESSION['kullanici_id']));
$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

?>


<section class="mt-5">
        <div class="container">
            <div class="cart">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"class="text-white">Ürün Adı</th>
                            <th scope="col"class="text-white">Ürün Fiyatı</th>
                            <th scope="col"class="text-white">Ürün Kodu</th>
                            <th scope="col"class="text-white">Adet</th>
                            <th scope="col"class="text-white">İşlem</th>
                        </tr>
                    </thead>

             <form action="islem.php" method="POST" >

                <?php
                $kullanici_id=$kullanicicek['kullanici_id'];
                $sepetsor=$db->prepare("SELECT * from sepet where kullanici_id=:id");
                $sepetsor->execute(array(
                'id' => $kullanici_id

                ));
                while($sepetcek = $sepetsor->fetch(PDO::FETCH_ASSOC)) {

                   $urun_id= $sepetcek['urun_id'];
                    $urunsor = $db->prepare("SELECT * FROM urunler where urun_id=:urun_id");
                    $urunsor->execute(array(
                    'urun_id' => $urun_id
                    ));

                    $uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);
                 @$toplam_fiyat+=$uruncek['urun_fiyat']*$sepetcek['urun_adet'] ;    // toplama işlemi

                    ?>

              <!--<input type ="hidden" name="urun_id[]" value="<?php echo $uruncek['urun_id']; ?>" >  ürünleri array şeklinede atadım ancak sepetsiz işlemlerden bunu kullan-->


                    <tbody>
                        <tr>
                            <td>
                                <div class="main">
                                    <div class="d-flex">
                     <!--W=145 H=98--> <img src="images/cart-1.jpg"alt="">
                                    </div>
                                    <div class="des">
                                        <p><?php echo $uruncek['urun_baslik']?></p>
                                    </div>

                                </div>
                            </td>
                            <td>
                                <h6>₺<?php echo $uruncek['urun_fiyat']?></h6>
                            </td>
                            <td>
                                 <p><?php echo $uruncek['urun_id']?></p>
                            </td>

                            <td>
                                <div class="counter">

                                    <input class="input-number"type="text"
                                    value="<?php echo $sepetcek['urun_adet']?>"min="0"max="10">

                                </div>
                            </td>
                            <td>
                            <a href="islem.php?sepetsil_id=<?php echo $sepetcek["sepet_id"]; ?>" class="btn btn-danger btn-sm">SİL</a>
                        </tr>
                              <?php  } ?>

                        <!----->
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </section>

    <div class="col-lg-4 offset-lg-4">
        <div class="checkout">
            <ul>
                <li class="subtotal">Ara Toplam
                 <span><?php echo @$toplam_fiyat?>₺</span>
                </li>
                <li class="cart-total">Total
                <span><?php echo @$toplam_fiyat?>₺</span></li>
            </ul>


        <input type="hidden" name="siparis_toplam" value=<?php echo @$toplam_fiyat?>>


            <button type="submit" name="siparis" class="btn btn btn-dark btn-lg">Proceed to Checkout</button>

      </form>
        </div>
    </div>



    <?php
        require_once('alt.php')
    ?>



