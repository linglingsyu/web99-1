<h3 class="cent">更新動畫圖片</h3>
<hr>
<form action="api/upload.php" method="post" enctype="multipart/form-data">
    <table style="width:80%; margin:0 auto;">
        <tr>
        <td style="text-align:right">動畫圖片：</td>
        <td><input type="file" name="img"></td>
        </tr>
    </table>
    <div style="width:100px;margin:0 auto;">
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
    <input type="hidden" name="table" value=<?= $_GET['table']  ?>>
    <input type="submit" value="更新">
    <input type="reset" value="重置"></div>
</form>
