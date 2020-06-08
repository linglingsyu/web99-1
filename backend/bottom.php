<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">頁尾版權資料管理</p>
    <form method="post" action="api/edit_footer.php">
    <!-- 因為這個檔案是被admin.php include的 所以位置要從admin的角度去寫 -->
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="50%">頁尾版權資料：</td>
                    <?php 
                    
                    $footer = new DB('footer');
                    $tt = $footer->find(1);
                                      
                    ?>
                    <td width="50%"><input type="text" name="footer" value="<?= $tt['footer']; ?>"></td>
                </tr>

            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                <!-- &#39;單引號 -->
                    <td width="200px"></td> 
                    <!-- 留下此欄確保另一個td位置不會跑掉 -->
                    <td class="cent"><input type="submit" value="修改確定">
                    <input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>