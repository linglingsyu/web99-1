<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">進站總人數管理</p>
    <form method="post" action="api/edit_bt.php">
    <!-- 因為這個檔案是被admin.php include的 所以位置要從admin的角度去寫 -->
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="50%">進站總人數：</td>
                    <?php 
                    $table = $do;
                    $db = new DB('total');
                    $tt = $db->find(1);
                                      
                    ?>
                    <td width="50%"><input type="number" name="total" value="<?= $tt['total']; ?>"></td>
                </tr>

            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                <!-- &#39;單引號 -->
                    <td width="200px"><input type="hidden" name="table" value=<?= $table?>></td> 
                    <!-- 留下此欄確保另一個td位置不會跑掉 -->
                    <td class="cent"><input type="submit" value="修改確定">
                    <input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>