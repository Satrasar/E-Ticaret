<?php
require_once("../baglan.php");

echo $_POST['kullanici_ad'].$_POST['kullanici_mail'].$_GET['kullanici_id'];

if (isset($_POST['kullanici_ad'], $_POST['kullanici_mail']) & isset($_GET['kullanici_id'])) {
  $kullanici_ad = trim(filter_input(INPUT_POST, 'kullanici_ad', FILTER_SANITIZE_STRING));
  $kullanici_mail = trim(filter_input(INPUT_POST, 'kullanici_mail', FILTER_SANITIZE_STRING));



  if (empty($kullanici_ad) || empty($kullanici_mail)) {
    die("<p>Lütfen formu eksiksiz doldurun!</p>");
  } else {
    $sorgu = $db->prepare("UPDATE kullanici set kullanici_ad=:kullanici_ad, kullanici_mail=:kullanici_mail where kullanici_id=:kullanici_id");
    $sonuc = $sorgu->execute(array(
      'kullanici_id' => $_GET['kullanici_id'],
      'kullanici_ad' => $_POST['kullanici_ad'],
      'kullanici_mail' => $_POST['kullanici_mail']
      
    ));
    if ($sonuc) {
     
      header("location:kullanicilar.php");
    } else {

      echo "<script type='text/javascript'>alert('Try Again!');</script>";
    }
  }
} else {
  echo "<script type='text/javascript'>alert('Parametreler Hatalı!');</script>";
}