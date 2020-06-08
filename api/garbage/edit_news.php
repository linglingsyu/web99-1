<?php

include_once '../base.php';

$news = new DB('news');

foreach($_POST["id"] as $key => $id){
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])  ){
        $news ->del($id);
    }else{
        $row = $news ->find($id);
        $row["text"]=$_POST['text'][$key];
        $row["sh"] = ((!empty($_POST['sh']) && in_array($id,$_POST['sh']) )) ? 1 : 0;
        $news -> save($row);
    }
}

to("../admin.php?do=news");

?>