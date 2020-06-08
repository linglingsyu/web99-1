<?php
include_once "../base.php";
$table = $_POST['table'];
$db = new DB($table);
$data = [];

if(!empty($_FILES['img']['tmp_name'])){
    $filename = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$filename);
    $data['img'] = $filename;
  }

  $data['text'] = $_POST['text'];
  if($table == "title"){
    $data['sh'] = 0;
  }else{
    $data['sh'] = 1;
  }

  $db->save($data);
  to("../admin.php?do=$table");


?>