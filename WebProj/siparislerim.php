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
                            <th scope="col"class="text-white">Sipariş No</th>
                            <th scope="col"class="text-white">Sipariş Tarihi</th>
                            <th scope="col"class="text-white">Sipariş Tutarı</th>
                            <th scope="col"class="text-white">Ödeme Tipi</th>
                            
                            
                        </tr>
                    </thead>

             <form action="islem.php" method="POST" >

                <?php
                $kullanici_id=$kullanicicek['kullanici_id'];
                $siparissor=$db->prepare("SELECT * from siparis where kullanici_id=:id");
                $siparissor->execute(array(
                'id' => $kullanici_id

                ));
                while($sipariscek = $siparissor->fetch(PDO::FETCH_ASSOC)) { ?>



                    <tbody>
                        <tr>
                            <td>
                                <div class="main">
                                    <div class="d-flex">
                     <!--W=145 H=98--> <img src="images/cart-1.jpg"alt="">
                                    </div>
                                    <div class="des">
                                        <p><?php echo $sipariscek['siparis_id']?></p>
                                    </div>

                                </div>
                            </td>
                            <td>
                                <p><?php echo $sipariscek['siparis_zaman']?></p>
                            </td>
                            <td>
                                 <p><?php echo $sipariscek['siparis_toplam']?></p>
                            </td>
                            <td>
                                 <p><?php echo $sipariscek['siparis_tip']?></p>
                            </td>

                            
                        </tr>
                              <?php  } ?>

                        <!----->
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </section>




    <?php
        require_once('alt.php')
    ?>



