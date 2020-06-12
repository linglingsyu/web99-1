<?php

session_start();
class DB
{
    // 設定屬性
    private $dsn = "mysql:host=localhost;charset=utf8;dbname=db99";
    private $root = "root";
    private $password = "";
    private $table = "";
    private $pdo;

    // 設定建構式

    public function __construct($table)
    {
        //this指的是db 
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, $this->root, $this->password);
    }

    // 取得全部資料
    public function all(...$arg)
    {
        $sql = "select * from $this->table ";

        if (!empty($arg[0]) && is_array($arg[0])) {
            foreach ($arg[0] as $key => $value) {
                $tmp[] = sprintf("`%s`='%s'", $key, $value);
            }
            $sql = $sql . " where " . implode("&&", $tmp);
        }
        //有第三個參數
        if (!empty($arg[1])) {
            $sql = $sql . $arg[1];
        }
        //此function一定要有第二個參數才能執行第三個參數
        return $this->pdo->query($sql)->fetchAll();
    }

    // 取得單筆資料

    public function find($arg)
    {
        $sql = "select * from $this->table ";

        if (is_array($arg)) {
            foreach ($arg as $key => $value) {
                $tmp[] = sprintf("`%s`='%s'", $key, $value);
            }
            $sql = $sql . " where " . implode("&&", $tmp);
        } else {
            $sql = $sql . " where `id`=" . "'" . $arg . "'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    // 計算筆數

    public function count(...$arg)
    {
        $sql = "select count(*) from $this->table ";
        if (!empty($arg[0]) && is_array($arg[0])) {
            foreach ($arg[0] as $key => $value) {
                $tmp[] = sprintf("`%s`='%s'", $key, $value);
            }
            $sql = $sql . " where " . implode("&&", $tmp);
        }
        if (!empty($arg[1])) {
            $sql = $sql . $arg[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    // 新增/更新資料
    public function save($arg)
    {
        if (!empty($arg['id'])) {
            //update
            // update $this->table set xxx=yyy where `id`='xxx'
            foreach ($arg as $key => $value) {
                if ($key != 'id') {
                    $tmp[] = sprintf("`%s`='%s'", $key, $value);
                }
            }
            $sql = "update `$this->table` set " . implode(",", $tmp) . " where `id` ='" . $arg['id'] . "'";
        } else {
            //insert
            // insert into  $this->table (``,``,``) values('','','')
            $sql = "insert into  `$this->table` (`" . implode("`,`", array_keys($arg)) . "`) values ('" . implode("','", $arg) . "')";
        }
        return $this->pdo->exec($sql);
    }

    // 刪除資料

    public function del($arg)
    {
        $sql = "delete from `$this->table` ";
        if (is_array($arg)) {
            foreach ($arg as $key => $value) {
                $tmp[] = sprintf("`%s`='%s'", $key, $value);
            }
            $sql = $sql . " where " . implode("&&", $tmp);
        } else {
            $sql = $sql . " where `id`=" . "'" . $arg . "'";
        }
        return $this->pdo->exec($sql);
    }

    public function list($array)
    {
        echo "<table width='" . $array['width'] . "'>";
        echo "<tr>";
        foreach ($array['header'] as $header) {
            echo "<td width=" . $header[1] . ">" . $header[0] . "</td>";
        }
        echo "</tr>";

        foreach ($array['rows'] as $row) {
            echo "<tr>";
            foreach ($row as $col) {
                echo "<td>$col</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    // 萬用語法
    function q($sql)
    {
        return $this->pdo->query($sql)->fetchAll();
    }
}


function to($url)
{
    header("location:" . $url);
}

if (empty($_SESSION['visited'])) {
    $total = new DB('total');
    $tt = $total->find(1);
    $tt['total']++;
    $total->save($tt);
    $_SESSION['visited'] = 1;
}

$Title = new DB('title');
$Ad = new DB('ad');
$Mvim = new DB('Mvim');
$Bottom = new DB('bottom');
$Admin = new DB('admin');
$Total = new DB('total');
$Menu = new DB('menu');
$News = new DB('news');
$Image = new DB('image');
