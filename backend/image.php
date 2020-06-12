<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園映象資料管理</p>
    <form method="post" action="api/edit.php">
    <!-- 因為這個檔案是被admin.php include的 所以位置要從admin的角度去寫 -->
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="68%">校園映像圖片</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
<?php
    $table = $do;
    $db = new DB($table); // 資料表
    $rows = $db-> all();
    $total = $db->count(); //撈出總筆數
    $num = 3; // 3筆一頁
    $pages = ceil($total / $num); //頁數
    $now = (!empty($_GET['p'])) ? $_GET['p'] : 1; //現在在哪一頁
    $start = ($now - 1) * $num;
    $ns = $db->all("", " limit $start,$num");
    foreach ( $rows as $row){
        $is_check=($row['sh'])?"checked":'';


?>
    <tr>
        <td width="68%"><img src="img/<?= $row['img']; ?>" style="width:100px;height:68px;"></td>
        <td width="7%"><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= $is_check ?>></td>
        <td width="7%"><input type="checkbox" name="del[]" value="<?= $row['id']; ?>" ></td>
        <td><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/upload_image.php?id=<?= $row['id']; ?>&table=<?= $table ?>&#39;)" value="更換圖片"></td>
        <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
    </tr>
<?php
  }
?>
            </tbody>
        </table>

        <div style="text-align:center;">
        <?php
        if (($now - 1 > 0)) {
        ?>
            <a class="bl" style="font-size:30px;" href="?do=<?= $table?>&p=<?= $now-1 ?>">&lt;&nbsp;</a>
        <?php
        }
        ?>

        <?php

        for ($i = 1; $i <= $pages; $i++) {
            $fontsize= (($i==$now)? '30px':'24px;');
        ?>
            <a class="bl" style="font-size:<?= $fontsize; ?>;" href="?do=<?= $table?>&p=<?= $i ?>"><?= $i ?></a>
        <?php
        }
        ?>
        <?php
        if($now + 1 > $pages){
        ?>
        <a class="bl" style="font-size:30px;" href="?do=<?= $table?>&p=<?= $now+1 ?>">&nbsp;&gt;</a>
        <?php
                }
        ?>
    </div>

        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                <!-- &#39;單引號 -->
                    <td width="200px">
                        <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/image.php&#39;)" value="新增校園映像圖片">
                        <input type="hidden" name="table" value=<?= $table ?>>
                    </td>

                    <td class="cent">
                        <input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>