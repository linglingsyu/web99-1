<?php
include_once "../base.php";
$ad = new DB('ad');
$text = $_POST['text'];
$sh = 1; //預設顯示是1
$ad->save(['text'=>$text,'sh'=>$sh]);
to("../admin.php?do=ad");
?>