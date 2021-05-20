<?php
session_start();

session_destroy();
header("Location:login_dash.php?durum=exit")


?>