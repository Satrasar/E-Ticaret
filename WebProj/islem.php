
<?php
ob_start();
session_start();

include("baglan.php");


require_once('ust.php');

//kullanıcı kontrolü baş
 if (isset($_POST['admingiris'])) {

    $kullanici_ad = $_POST['kullanici_ad'];
    $kullanici_password = ($_POST['kullanici_password']);
  //kullanici_adi kısmı veri tabanından diğer ksımı ise değer gibi kullanıyoruz
  $kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_ad =:kullanici_ad and kullanici_password =:kullanici_password "); 
  $kullanicisor -> execute(array(
     'kullanici_ad' => $kullanici_ad,
     'kullanici_password' => $kullanici_password 
  ));
  $kullanici_check = $kullanicisor->fetch(PDO::FETCH_ASSOC);
    
  if ($kullanici_check){

   $_SESSION['kullanici_ad'] = $kullanici_ad;
   $_SESSION['kullanici_mail'] = $kullanici_check['kullanici_mail'];
   $_SESSION['kullanici_yetki'] = $kullanici_check['kullanici_yetki'];
   $_SESSION['kullanici_id'] = $kullanici_check['kullanici_id'];
   
   header("location:index.php"); 
   exit;

      
  } else {
 
       header("location:admin_paneli/login_dash.php?durum=no"); 
       exit;
  }
 }
//kullanıcı kontrolü bitiş

//kullanıcı sil baş
 if(@$_GET['kullanicisil']=="ok"){
    
  $sil = $db-> prepare("DELETE from kullanici where kullanici_id=:id");
  $kontrol = $sil->execute(array(
     'id' => $_GET['kullanici_id']
  ));
  
 if($kontrol){

   header("location:admin_paneli/kullanicilar.php?sil=ok");
 } else{
    header("location:admin_paneli/kullanicilar.php?sil=no");
 }

 }
//kullanıcı sil bitiş


//urun sil baş
if(@$_GET['urunsil']=="ok"){
    
   $sil = $db-> prepare("DELETE from urunler where urun_id=:id");
   $kontrol = $sil->execute(array(
      'id' => $_GET['urun_id']
   ));
   
  if($kontrol){
 
    header("location:admin_paneli/urunler.php?sil=ok");
  } else{
     header("location:admin_paneli/urunler.php?sil=no");
  }
 
  }

?>

<!--Ürün ekleme dashboard başlangıç-->

<?php

if(isset($_POST["urun_ekle"])){
   
 $connect = $db->prepare( " INSERT INTO urunler (urun_baslik,urun_fiyat, urun_stok, urun_resim, urun_hakkinda) VALUES(:urun_baslik,:urun_fiyat, :urun_stok, :urun_resim, :urun_hakkinda) ");
 $statement = $connect->execute(
    array(
   ':urun_baslik' =>$_POST['urun_baslik'],
   ':urun_fiyat'   => $_POST['urun_fiyat'],
   ':urun_stok'  => $_POST['urun_stok'],
   ':urun_resim'  => $_POST['urun_resim'],
   ':urun_hakkinda' => $_POST['urun_hakkinda']
  )
 );

 if(isset($statement))
 {
    echo "<script type='text/javascript'>alert('Kayıt Başarılı!');</script>";
    Header("Refresh: 0.1; url=admin_paneli/urunler.php");
 }
}

//yorum sil baş
if(@$_GET['yorumsil']=="ok"){
    
   $sil = $db-> prepare("DELETE from yorumlar where yorum_id=:id");
   $kontrol = $sil->execute(array(
      'id' => $_GET['yorum_id']
   ));
   
  if($kontrol){
 
    header("location:admin_paneli/yorum_liste.php?sil=ok");
  } else{
     header("location:admin_paneli/yorum_liste.php?sil=no");
  }
 
  }
 //yorum sil bitiş


//sepete ekleme



if(isset($_POST["sepeteekle"]))
{
 
 $connect = $db->prepare( " INSERT INTO sepet (urun_adet,kullanici_id, urun_id) VALUES(:urun_adet,:kullanici_id,:urun_id)");
 $statement = $connect->execute(
    array(
   ':urun_adet' =>$_POST['urun_adet'],
   ':kullanici_id'=> $_SESSION['kullanici_id'],
   ':urun_id'  => $_POST['urun_id']
   
  )
 );

 if(isset($statement))
 {
    
    Header("Location:sepet.php?durum=ok");
 }

 else{
   header("Location:sepet.php?durum=no");

 }
}

//sepetteki ürünü silme işlemi
  @$sepetsil_id = $_GET["sepetsil_id"];
  if (isset($sepetsil_id)) {
      $url = htmlspecialchars($_SERVER['HTTP_REFERER']); 
     $sepet = $db->prepare("DELETE FROM sepet WHERE sepet_id=?");
     $delete = $sepet->execute(array($sepetsil_id));
     if ($delete) {
         //  echo "<script type='text/javascript'>alert('Sepetteki ürün silindi !');</script>";
          header("Refresh: 0.1; url=$url");	
      } 
      else {
          echo "<script type='text/javascript'>alert('İptal İşlemi Başarısız!');</script>";
          header("Refresh: 0.1; url=$url");		}
  }



  //siparis
  if(isset($_POST["siparis"]))
{
 $siparis_tip="Banka Havalesi";
 $connect = $db->prepare( " INSERT INTO siparis (siparis_toplam,kullanici_id,siparis_tip) VALUES(:siparis_toplam,:kullanici_id,:siparis_tip)");
 $statement = $connect->execute(
    array(
   ':siparis_toplam' =>$_POST['siparis_toplam'],
   ':kullanici_id'=> $_SESSION['kullanici_id'],
   ':siparis_tip'=>$siparis_tip,
   ));

 if($statement) {
  

    //sipariş oluşursa buraya gönder!
    $siparis_id = $db->lastInsertId(); //eklenen en son id almak için kullanıyoruz

   //  $urunler = $_POST['urun_id'];

   
 
   $kullanici_id=$_SESSION['kullanici_id'];
   $sepetsor=$db->prepare("SELECT * from sepet where kullanici_id=:id");
   $sepetsor->execute(array(
   'id' => $kullanici_id

   ));
   while($sepetcek = $sepetsor->fetch(PDO::FETCH_ASSOC)) {

    $urun_idsi=$sepetcek['urun_id'];
    $urun_adet=$sepetcek['urun_adet'];
    
    

      $urunsor = $db->prepare("SELECT * FROM urunler WHERE urun_id =:id");
      $urunsor->execute(array(
         'id' => $urun_idsi
      ));

      $uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);
      $urun_fiyat=$uruncek['urun_fiyat'];


      $kaydet=$db->prepare("INSERT INTO siparis_detay SET

      siparis_id=:siparis_id,
      urun_id=:urun_id,
      urun_fiyat=:urun_fiyat,
      urun_adet=:urun_adet 
      ");

      $insert=$kaydet->execute(array(
      'siparis_id' => $siparis_id,
      'urun_id'  => $urun_idsi,
      'urun_fiyat' => $urun_fiyat,
      'urun_adet' => $urun_adet

    ));

   }
  

if($insert){ //eğer başarılysa sepeti boşalt

  
$sil=$db->prepare("DELETE FROM sepet where kullanici_id=:kullanici_id");
$kontrol=$sil->execute(array(
'kullanici_id' => $kullanici_id
));
 
                 
      
header("Location:sepet.php?durum=ok");

}


 }else{
   //header("Location:index.php?durum=no");
   echo"basarısız";

 }
}
//dashboaard sipaiş silme
@$siparis_dash_id = $_GET["siparis_dash_id"];
if (isset($siparis_dash_id)) {
    $url = htmlspecialchars($_SERVER['HTTP_REFERER']); 
   $siparis = $db->prepare("DELETE FROM siparis WHERE siparis_id=?");
   $delete = $siparis->execute(array($siparis_dash_id));
   if ($delete) {
       //  echo "<script type='text/javascript'>alert('Sepetteki ürün silindi !');</script>";
        header("Refresh: 0.1; url=$url");	
    } 
    else {
        echo "<script type='text/javascript'>alert('İptal İşlemi Başarısız!');</script>";
        header("Refresh: 0.1; url=$url");		}
}



//teslim edildi
if(isset($_POST["teslim"])){
   $kullanici_id=$_SESSION['kullanici_id'];
   print_r($kullanici_id);
   $teslimsor=$db->prepare("SELECT * from siparis where kullanici_id=:id");
   $teslimsor->execute(array(
   'id' => $kullanici_id

   ));
   while($sepetcek = $teslimsor->fetch(PDO::FETCH_ASSOC)) {

      $siparis_id=$sepetcek['siparis_id'];
      $siparis_zaman=$sepetcek['siparis_zaman'];
      $kullanici_id=$sepetcek['kullanici_id'];
      $siparis_toplam=$sepetcek['siparis_toplam'];
      $siparis_tip=$sepetcek['siparis_tip'];
      
      
      $kaydet=$db->prepare("INSERT INTO siparis_teslim SET

      siparis_id=:siparis_id,
      siparis_zaman=:siparis_zaman,
      kullanici_id=:kullanici_id,
      siparis_toplam=:siparis_toplam,
      siparis_tip=:siparis_tip
      
      
      ");

      $insert=$kaydet->execute(array(
      'siparis_id' => $siparis_id,
      'siparis_zaman' => $siparis_zaman,
      'kullanici_id' => $kullanici_id,
      'siparis_toplam' => $siparis_toplam,
      'siparis_tip' => $siparis_tip
    

    ));
   
   
}
if(@$insert){ //eğer başarılysa sepeti boşalt

  
   $sil=$db->prepare("DELETE FROM siparis where kullanici_id=:kullanici_id");
   $kontrol=$sil->execute(array(
   'kullanici_id' => $kullanici_id
   ));

}
header("Location:admin_paneli/siparisler_dash.php?durum=ok");
}

?>




 




