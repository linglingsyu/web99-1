<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">主選單管理</p>
    <form method="post" action="api/edit_submenu.php">
    <!-- 因為這個檔案是被admin.php include的 所以位置要從admin的角度去寫 -->
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="30%">主選單名稱</td>
                    <td width="30%">主選單連結網址</td>
                    <td width="15%">次選單數</td>
                    <td width="8%">顯示</td>
                    <td width="8%">刪除</td>
                    <td width="9%"></td>
                </tr>
<?php
    $table = $do;
    $db = new DB($table); // 資料表
    $rows = $db-> all(['parent'=>0]);
    foreach ( $rows as $row){
        $is_check=($row['sh'])?"checked":'';
?>
    <tr>
        <td><input type="text" style="width:90%" name="name[]" value="<?= $row['name']; ?>"></td>
        <td><input type="text" name="href[]" value="<?= $row['href']; ?>" ></td>
        <td><?= $db->count(['parent'=>$row['id']])  ?></td>
        <td><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= $is_check ?> ></td> 
        <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>" ></td>  
        <td><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/submenu.php?id=<?= $row['id'];?>&table=<?= $table; ?>&#39;)" value="編輯次選單"></td>
        <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
    </tr>
<?php
  }
?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                <!-- &#39;單引號 -->
                <td width="200px">
                    <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/menu.php?table=<?= $table; ?>&#39;)" value="新增主選單">
                    <input type="hidden" name="table" value=<?= $table ?>>
                </td>

                <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>