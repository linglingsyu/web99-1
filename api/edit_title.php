<?php

include_once '../base.php';

$title = new DB('title');

// if(!empty($_POST))  偷懶一點 因為考試一定有資料會送出,就不用判斷了(如果在什麼資料都沒有的情況下,這邊會報錯)

foreach($_POST["id"] as $key => $id){
// $id有出現在del的陣列裡表示才是要被刪除的資料 ,del內的id就直接刪除資料不需要做更新,del陣列內沒有出現的id表示才是要被更新的資料id
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])  ){
        $title ->del($id);
    }else{
        $row = $title ->find($id);
        $row["text"]=$_POST['text'][$key];
        // 如果id = $_POST["sh"]的值,才是要顯示
        $row["sh"] = ($_POST["sh"] == $id ) ? 1 : 0;
        $title -> save($row);

    }
}

to("../admin.php?do=title");

?>