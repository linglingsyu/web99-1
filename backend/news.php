<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">最新消息資料管理</p>
    <form method="post" action="api/edit.php">
    <!-- 因為這個檔案是被admin.php include的 所以位置要從admin的角度去寫 -->
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="68%">最新消息文字</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                </tr>
<?php
    $news = new DB('news'); // 資料表
    $rows = $news-> all();
    foreach ( $rows as $row){
        $is_check=($row['sh'])?"checked":'';
?>
    <tr>
        <td width="68%"><textarea name="text[]" cols="30" rows="10" value="<?= $row['text']; ?>" ></textarea></td>
        <td width="7%"><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= $is_check ?>></td>
        <td width="7%"><input type="checkbox" name="del[]" value="<?= $row['id']; ?>" ></td>
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
                    <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/news.php&#39;)" value="新增最新消息資料">
                    <input type="hidden" name="table" value="news">
                </td>
                    <td class="cent">
                        <input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>