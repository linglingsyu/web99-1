<?php

include_once "../base.php";

$db = new DB("menu"); //$_GET['table]

//有ID這個欄位表示有資料要編輯
if(!empty($_POST['id'])){
  foreach($_POST['id'] as $key => $id){
    if(!empty($_POST['del'] && in_array($id,$_POST['del']))){
      //刪除
      $db->del($id);
    }else{
      //編輯
      $row = $db->find($id);
      $row['name'] = $_POST['name'][$key];
      $row['href'] = $_POST['href'][$key];
      $db->save($row);

    }
  }
}
$parent = $_POST['parent'];
//新增
if(!empty($_POST['nameadd'])){
  //這邊一次新增可能好幾筆
  foreach($_POST['nameadd'] as $key=>$name ){
    $new = [];
    $new['name'] = $name;
    $new['href'] = $_POST['hrefadd'][$key];
    $new['sh'] =1;
    $new['parent'] = $parent;
    $db->save($new);
  }
}
to("../admin.php?do=menu");


?>