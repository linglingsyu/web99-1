<?php
include_once "../base.php";

$table = $_POST['table'];
$db = new DB($table);
$row = $db->find($_POST['id']);
if(!empty($_FILES['img']['tmp_name'])){
    $filename = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$filename);
    $row['img'] = $filename;
    $db->save($row);
}
to("../admin.php?do=$table");

?>