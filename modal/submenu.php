<?php 

include_once "../base.php"; 
$db = new DB($_GET['table']);
$subs = $db -> all (["parent"=>$_GET['id']]);

?> 

<h3 class="cent">編輯次選單</h3>
<hr>
<form action="api/edit_submenu.php" method="post" enctype="multipart/form-data">
    <table style="width:80%; margin:0 auto;" id="sub">
        <tr>
            <td style="text-align:center">次選單名稱</td>
            <td>次選單連結網址</td>
            <td>刪除</td>
        </tr>
        <?php
        foreach ($subs as $sub){
        ?>
        <tr>
            <td><input type="text" name="name[]" value="<?= $sub['name'] ?>"></td>
            <td><input type="text" name="href[]" value="<?= $sub['href'] ?>"></td>
            <td><input type="checkbox" name="del[]" value="<?= $sub['id'] ?>"></td>
            <td><input type="hidden" name="id[]" value="<?= $sub['id'] ?>"></td>
        </tr>
        <?php
            }
        ?>

    </table>
    <div style="width:50%;margin:auto;text-align:center">
    <input type="hidden" name="table" value="<?= $_GET['table']?>">
    <input type="hidden" name="parent" value="<?= $_GET['id'] ?>">
    <input type="submit" value="修改確認">
    <input type="reset" value="重置">
    <input type="button" value="更多次選單" onclick="more()">
</div>
</form>

<script>
    function more(){
        //要用``上引號(ES6寫法)
        let row = `
            <tr>
            <td><input type="text" name="nameadd[]"></td>
            <td><input type="text" name="hrefadd[]"></td>
            <td></td>   
            <tr>    
        `;

        $("#sub").append(row)
        //JQ語法:請在#sub後面加入row
        /*
        append()——其方法是將方法裡面的引數新增到jquery物件中來；
        如：A.append(B)的意思是將B放到A中來，後面追加,A的子元素的最後一個位置；
        
        */

    }



</script>