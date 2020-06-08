<?php

include_once '../base.php';

$ad = new DB('ad');

foreach($_POST["id"] as $key => $id){
// $id有出現在del的陣列裡表示才是要被刪除的資料 ,del內的id就直接刪除資料不需要做更新,del陣列內沒有出現的id表示才是要被更新的資料id
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])  ){
        $ad ->del($id);
    }else{
        $row = $ad ->find($id);
        echo "<pre>";
        print_r($row);
        echo "</pre>";
        $row["text"]=$_POST['text'][$key];
        // 在做title.php時 因為是radio，$_POST["sh"]值是id，但這邊sh變成是一個陣列，裡面放的是有哪幾筆的id要顯示
        $row["sh"] = ((!empty($_POST['sh']) && in_array($id,$_POST['sh'])  )) ? 1 : 0;
        $ad -> save($row);
    }
}

to("../admin.php?do=ad");

?>