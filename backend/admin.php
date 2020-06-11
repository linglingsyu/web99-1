<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">管理者帳號管理</p>
    <form method="post" action="api/edit.php">
    <!-- 因為這個檔案是被admin.php include的 所以位置要從admin的角度去寫 -->
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">帳號</td>
                    <td width="45%">密碼</td>
                    <td width="10%">刪除</td>
                </tr>
<?php
    $table = $do;
    $db = new DB($table); // 資料表
    $rows = $db-> all();
    foreach ( $rows as $row){
        $is_check=($row['pw'])?"checked":'';
?>
    <tr>
        <td width="45%"><input type="text" style="width:90%" name="acc[]" value="<?= $row['acc']; ?>"></td>
        <td width="45%"><input type="password" name="pw[]" value="<?= $row['pw']; ?>" <?= $is_check ?>></td>
        <td width="10%">
        <?php 
            if($row['acc'] != 'admin' ){ 
         ?>    
            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>" >   
        <?php   
         }        
         ?>
        </td>  
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
                    <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/admin.php?table=<?= $table; ?>&#39;)" value="新增管理者帳號">
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