

<h3 class="cent">新增主選單</h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
    <table style="width:80%; margin:0 auto;">
        <tr>
            <td style="text-align:right">主選單名稱</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td style="text-align:right">選單連結網址</td>
            <td><input type="text" name="href"></td>
        </tr>
    </table>
    <div style="width:100px;margin:0 auto;">
    <input type="hidden" name="table" value=<?= $_GET['table'] ?>>
    <input type="submit" value="新增"><input type="reset" value="重置"></div>
</form>
