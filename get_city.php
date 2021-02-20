<?php
require_once realpath("vendor/autoload.php");
use Project\Register;
$register = new Register();

$id=$_POST['id'];
$type=$_POST['type'];

if($type=='city'){
	$sql="SELECT town FROM city WHERE country_id='$id'";
}

$html='';
foreach($register->getCity($sql) as $city){
	$html.='<option value='.$city->id.'>'.$city->town.'</option>';
}
echo $html;
?>


