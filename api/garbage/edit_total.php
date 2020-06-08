<?php

include_once '../base.php';
$total = new DB('total');
//因為資料表只會有一筆資料，而且ｉｄ＝１　所以直接撈資料
$row = $total->find(1);
$row['total'] = $_POST['total'];
$total->save($row);
to("../admin.php?do=total");

?>