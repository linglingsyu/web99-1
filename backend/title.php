<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">網站標題管理</p>
    <form method="post" action="api/edit.php">
    <!-- 因為這個檔案是被admin.php include的 所以位置要從admin的角度去寫 -->
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">網站標題</td>
                    <td width="23%">替代文字</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
<?php
    $table = $do;
    $db = new DB($table); // 資料表
    $rows = $db-> all();
    foreach ( $rows as $row){
        $is_check=($row['sh'])?"checked":'';
?>
    <tr>
        <td width="45%"><img src="img/<?= $row['img']; ?>" style="width:300px;height:30px;"></td>
        <td width="23%"><input type="text" name="text[]" value="<?= $row['text']; ?>"></td>
        <td width="7%"><input type="radio" name="sh" value="<?= $row['id']; ?>" <?= $is_check ?>></td>
        <td width="7%"><input type="checkbox" name="del[]" value="<?= $row['id']; ?>" ></td>
        <td><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/upload_title.php?id=<?= $row['id'];?>&table=<?= $table; ?>&#39;)" value="更新圖片"></td>
        <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
    </tr>
<?php
  }
?>
            </tbody>
        </table>


        <?php
$rows = $db-> all();
$array =[
    'width' =>'50%',
    'header'=>[
        ['網站標題','45%'],
        ['替代文字','23%'],
        ['顯示','7%'],
        ['刪除','7%'],
        ['操作',''],
    ],
  ];
  foreach ( $rows as $row){
   $array['rows'][]=
   [
    ["<img src='img/".$row['img']." style='width:300px;height:30px'>",
    "<input type='text[]' name='text' value='AAAAAA' >",
    "<input type='radio' name='sh' value='".$row['id']."'"." ".$is_check.">",
    "<input type='checkbox' name='del[]' value='".$row['id']."' >",
    'button']

   ];
}
      $is_check=($row['sh'])?"checked":'';

  $db->list($array);
?>


        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                <!-- &#39;單引號 -->
                    <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/title.php?table=<?= $table; ?>&#39;)" value="新增網站標題圖片">
                    <input type="hidden" name="table" value=<?= $table; ?>>
                </td>
                    <td class="cent">
                    <input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>