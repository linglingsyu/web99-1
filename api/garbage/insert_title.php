<?php
include_once "../base.php";

$table = $_POST["table"];
$db = new DB($table);

//判斷檔案有無上傳成功->取得上傳檔名-搬檔案
if(!empty($_FILES['img']['tmp_name'])){
    $filename = $_FILES['img']['name']; //(缺點..若有人上傳檔名一樣但是內容不一樣的檔案會被替換掉)
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/" . $filename);
    //要小心路徑!! 
}

$text = $_POST['text'];
$sh = 0;
$db->save(['text'=>$text,'img'=>$filename,'sh'=>$sh]);
to("../admin.php?do=$table");
//表單寫在view.php->透過ajax(load)->到admin.php->按下submit傳到insert_title.php做save->回admin(顯示title.php)
?>