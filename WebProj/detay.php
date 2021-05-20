        <?php include("baglan.php"); ?>
        <?php
        ob_start();
        session_start();
        ?>

        <?php
        require_once('ust.php')
        ?>

        <?php
        require_once('header.php')
        ?>



<!-- sepet veritabanına kullanici_id cekerken hata alıyordum bunun için kullanici kısmını aşşağıdaki gibi tanımladım -->
       



        <?php
    //     if($_SESSION){

    //    $kullanici_id = $_SESSION['kullanici_id'];
    //    $kullanicisor = $db->prepare("select * from kullanici WHERE kullanici_id= :kullanici_id");
    //    $kullanicisor->execute(array('kullanici_id' => $_SESSION['kullanici_id']));
    //    $kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);
       
    //    }


        $id = $_GET["urun_id"];
        $urun = $db->prepare("select * from urunler where urun_id=?");
        $urun->execute(array($id));
        $x = $urun->fetchALL(PDO::FETCH_ASSOC);

        foreach ($x as $m) {
        ?>


            <div class="container">

                <!-- boşuk bırakmama yardım etti -->
                <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1567795542108_278025">

                    <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1567795542108_278025">
                        <div class="sqs-block-content">
                            <p class="" style="white-space:pre-wrap;"><br></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-5">
                            <img src="<?php echo $m["urun_resim"]; ?>" alt="Image" class="img-fluid tm-intro-img">
                        </div>
                        <div class="col-lg-7">
                            <div class="tm-intro-text-container">
                                <h3 class="display-6"><?php echo $m["urun_baslik"]; ?></h3>
                                <div class="yazi">


                                    <em> <?php echo $m["urun_fiyat"]; ?> TL </em> <br>

                                </div>

                                <p class="mb-2 tm-intro-text">
                                    <?php echo $m["urun_hakkinda"]; ?> </p> <br>

                                &nbsp <br>

                                <form action="islem.php" method="POST">
                                 <input type="hidden" name="urun_id" value="<?php echo $m['urun_id'] ?>" > <!-- hidden olarak tanımladık çünkü sepete eklerken gözükmesin istiyoruz -->
                              

                                <div class="mb-3">
                                    <div class="col-2">
                                        <input type="text" value="1" name="urun_adet" class="form-control" placeholder="Adet">
                                    </div>

                                </div>
                                <?php if (isset($_SESSION['kullanici_id'])) {?>
                                <!--&nbsp =boşluk oluşturmama yardım etti -->
                                <button type="submit" name="sepeteekle" class="btn btn-outline-secondary">Sepete Ekle</button>
                               <?php } else{ ?>

                                <button type="submit" name="sepeteekle" disabled class="btn btn-danger">GİRİŞ YAPINIZ</button>
                                <?php } ?>




                                </form>
                                
                                 </div> <!--bu div 2 ye ayıran column un ayrımı -->
                            </div>&nbsp
  
                              <?php
                        }

                       

                         if($_POST){
                            $isim = $_POST["isim"];
                            $mail = $_POST["mail"];
                            $mesaj = $_POST["mesaj"];

                           if(!$mesaj || !$mail){
                               echo 'boş bırakmayın';
                           }else{
                          
                             $yorum = $db->prepare("INSERT into yorumlar set
                             
                             yorum_ekleyen=?,
                             yorum_eposta=?,
                             yorum_mesaj=?,
                             yorum_urun_id=?
                                                          
                             ");
                             $ekle = $yorum->execute(array($isim,$mail,$mesaj,$id));
                             
                             if($ekle){

                                echo '<div class="alert alert-warning" role="alert">
                                Yorumunuz eklendi..Yönlendiriliyorsunuz!
                              </div>';
                                $url = $_SERVER["HTTP_REFERER"];
                                header("refresh: 2; url=$url");


                             }else{
                                 echo 'yorum eklenirken hata oluştu';
                             }


                           }

                        }else{

                            if($_SESSION){


                                ?>
                               
                                <form action="" method="POST" >
                                 <div class="form-group">
                               
                                 <input type="hidden" value="<?php echo $_SESSION['kullanici_ad'];?>" class="form-control" placeholder="Kullanıcı Adı" name="isim">
                                 </div>
                                 <div class="form-group">
                                 <input type="hidden" value="<?php echo $_SESSION['kullanici_mail'];?>" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kullanıcı Mail" name="mail">
                                   </div>
                                   <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Yorum Ekle" rows="4" name="mesaj"></textarea><br>
 
                                 <button type="submit" class="btn btn-outline-secondary">Gönder</button>
                                 </form>&nbsp
                                                         
                             <?php


                            }else{


                                ?>
                               
                                <form action="" method="POST" >
                                 <div class="form-group">
                                 <input type="text" class="form-control" placeholder="Kullanıcı Adı" name="isim">
                                 </div>
                                 <div class="form-group">
                                 <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kullanıcı Mail" name="mail">
                                   </div>
                                   <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Yorum Ekle" rows="4" name="mesaj"></textarea><br>
 
                                 <button type="submit" class="btn btn-outline-secondary">Gönder</button>
                                 </form>&nbsp
                                                         
                             <?php


                            }
                         
                          

                        }
                        $yorum = $db -> prepare("SELECT * from yorumlar  WHERE yorum_urun_id =?  ");
                        $yorum -> execute(array($id));
                        $b = $yorum->fetchAll(PDO::FETCH_ASSOC);
                        $x = $yorum->rowCount();

                          if($x){

                            foreach($b as $m){
                                
                                ?>
                                            
                            <div class="container mt-9 mb-3">
                <div class="d-flex justify-content-center row">
                    <div class="col-md-12">
                        <div class="shadow-none p-3 mb-8 bg-light rounded">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex flex-row user"><img class="rounded-circle img-fluid img-responsive" src="https://i.imgur.com/Yxje2El.jpg" width="40">
                                    <div class="d-flex flex-column ml-2"><span class="font-weight-bold">@<?php echo $m['yorum_ekleyen']?></span><span class="day"><?php echo $m['yorum_tarih']?></span></div>
                                </div>
                            </div>
                            <div class="comment-text text-justify mt-2">
                                <p><?php echo $m['yorum_mesaj']?></p>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
              </div>


                                <?php
                            

                            }


                          }else{

                            echo '<div class="alert alert-primary" role="alert">
                            Henüz Yorum Eklenmemiş  </div>';
                           
                          }
       
                              ?>
                          
                           

                          

        <div class="sqs-block html-block sqs-block-html" data-block-type="2" id="block-yui_3_17_2_1_1567795542108_278025">
            <div class="sqs-block-content">
                <p class="" style="white-space:pre-wrap;"><br></p>
            </div>
        </div>


        </div>

                


                        </div>
                    </div>
                </div>




        <?php
        require_once('alt.php')
        ?>