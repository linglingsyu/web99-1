<h3 class="cent">新增校園映像圖片</h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
    <table style="width:80%; margin:0 auto;">
        <tr>
        <td style="text-align:right">校園映像圖片：</td>
        <td><input type="file" name="img"></td>
        </tr>
    </table>
    <div style="width:100px;margin:0 auto;">
    <input type="hidden" name="table" value=<?= $_GET['table']  ?>>
    <input type="submit" value="新增"><input type="reset" value="重置"></div>
</form>

