<?php
include_once '../base.php';
$table = $_POST["table"];
echo $table;
$db = new DB($table);
$row = $db->find(1);

if(!empty($_POST['total'])){
  $row['total'] = $_POST[$table];
}else{
  $row['bottom'] = $_POST[$table];
}
$db->save($row);
to("../admin.php?do=$table");

?>