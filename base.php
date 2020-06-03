<?php

class db{
// 設定屬性
    private $dsn = "mysql:host=localhost;charset=utf8;dbname=db99";
    private $root = "root";
    private $password = "";
    private $table = "";
    private $pdo;

// 設定建構式

public function __construct($table){
    //this指的是db 
    $this->table = $table;
    $this->pdo = new PDO($this->dsn,$this->root,$this->password);
}

// 取得全部資料
public function all(...$arg){
    $sql = "select * from $this->table ";

    if(!empty($arg[0]) && is_array($arg[0])){
        foreach($arg[0] as $key => $value){
            $tmp[] = sprintf("`%s`='%s'",$key,$value);
        }
        $sql = $sql . " where " . implode("&&",$tmp);
    }else{
        //如果帶入的參數不是空的也不是陣列 , 就直接執行
        $sql = $sql.$arg[0];
    }

    //有第三個參數
    if( !empty($arg[1]) ){
        $sql = $sql .$arg[1];
    }
    //此function一定要有第二個參數才能執行第三個參數
    return $this->pdo->query($sql)->fetchAll();

}

// 取得單筆資料

public function find($arg){
    $sql = "select * from $this->table ";

    if(is_array($arg)){
        foreach($arg as $key => $value){
            $tmp[] = sprintf("`%s`='%s'",$key,$value);
        }
        $sql = $sql . " where " . implode("&&",$tmp);
    }else{
        $sql = $sql. " where `id`=" . "'" . $arg . "'";
    }
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

}

// 計算筆數

public function count(...$arg){
    $sql = "select count(*) from $this->table ";
    if(!empty($arg[0]) && is_array($arg[0])){
        foreach($arg[0] as $key => $value){
            $tmp[] = sprintf("`%s`='%s'",$key,$value);
        }
        $sql = $sql . " where " . implode("&&",$tmp);
    }
    if( !empty($arg[1]) ){
        $sql = $sql .$arg[1];
    }
    return $this->pdo->query($sql)->fetchColumn();
}

// 新增/更新資料

// 刪除資料

public function del($arg){
    $sql = "delect from $this->table ";
    if(is_array($arg)){
        foreach($arg as $key => $value){
            $tmp[] = sprintf("`%s`='%s'",$key,$value);
        }
        $sql = $sql . " where " . implode("&&",$tmp);
    }else{
        $sql = $sql. " where `id`=" . "'" . $arg . "'";
    }
    return $this->pdo->exec($sql);
 }

 // 取得全部資料

// 萬用語法
function q($sql){
    return $this->pdo->query($sql)->fetchAll();
 }

}



function to($url){
    header("location:".$url);
}





?>