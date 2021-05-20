

<?php
include('baglan.php');

if(isset($_POST["kayit"]))
{
 $connect = $db->prepare( "INSERT INTO kullanici (kullanici_ad,kullanici_mail, kullanici_password) VALUES(:kullanici_ad,:kullanici_mail, :kullanici_password) ");
 $statement = $connect->execute(
    array(
   ':kullanici_ad' =>$_POST['kullanici_ad'],
   ':kullanici_mail'   => $_POST['kullanici_mail'],
   ':kullanici_password'  => $_POST['kullanici_password']
   
  )
 );

 if(isset($statement))
 {
    
    Header("Refresh: 0.1; url=admin_paneli/login_dash.php");
 }
}
?>