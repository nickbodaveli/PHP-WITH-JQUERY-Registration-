<?php 
require_once realpath("vendor/autoload.php");
use Project\Register;
$register = new Register();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $register->getCountry($_POST);
}

include 'views/register_form.php';
?>



