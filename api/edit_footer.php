<?php

include_once '../base.php';
$footer = new DB('footer');
//因為資料表只會有一筆資料，而且ｉｄ＝１　所以直接撈資料
$row = $footer->find(1);
$row['footer'] = $_POST['footer'];
$footer->save($row);
to("../admin.php?do=bottom");

?>