<?php
include_once '../base.php';
$table = $_POST["table"];
$db = new DB($table);
$row = $db->find(1);

if(!empty($_POST['total'])){
  $row['total'] = $_POST['total'];
}else{
  $row['footer'] = $_POST['footer'];
}
$db->save($row);
to("../admin.php?do=$table");

?>