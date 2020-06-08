<?php
include_once "../base.php";

$mvim = new DB('mvim');

if(!empty($_FILES['img']['tmp_name'])){
    $filename = $_FILES['img']['name']; 
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/" . $filename);
}
$sh = 1;
$mvim->save(['img'=>$filename,'sh'=>$sh]);
to("../admin.php?do=mvim");
?>