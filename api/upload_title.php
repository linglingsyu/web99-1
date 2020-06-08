<?php
include_once "../base.php";

$title = new DB('title');
//先撈出這筆id的資料
$row = $title->find($_POST['id']);
//有上傳成功才更新檔案
if(!empty($_FILES['img']['tmp_name'])){
    $filename = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$filename);
    $row['img'] = $filename; //更新檔名
    $title->save($row); //把資料存回title資料表
}
to("../admin.php?do=title");

?>