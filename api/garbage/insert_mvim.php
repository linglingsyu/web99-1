<?php
include_once "../base.php";
$table =  $_POST["table"];
$db = new DB('mvim');

if(!empty($_FILES['img']['tmp_name'])){
    $filename = $_FILES['img']['name']; 
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/" . $filename);
}
$sh = 1;
$db->save(['img'=>$filename,'sh'=>$sh]);
to("../admin.php?do=$table");
?>