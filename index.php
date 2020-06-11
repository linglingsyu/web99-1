<?php include_once "base.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>卓越科技大學校園資訊系統</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <div id="cover" style="display:none; ">
        <div id="coverr">
            <a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
            <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
        </div>
    </div>
    <iframe style="display:none;" name="back" id="back"></iframe>
    <div id="main">
        <?php 
		    $title = new DB('title');
		    $ti = $title->find(['sh'=>1]);	
        ?>
            <a title="<?= $ti['text']; ?>" href="index.php">
            <div class="ti" style="background:url(&#39;img/<?= $ti['img']; ?>&#39;); background-size:cover;"></div>
            <!--標題-->
        </a>
        <div id="ms">
            <div id="lf" style="float:left;">
                <div id="menuput" class="dbor">
                    <!--主選單放此-->
                    <span class="t botli">主選單區</span>
                    <?php

                    $menu = new DB("menu");
                    $mains = $menu->all(['parent'=>0,'sh'=>1]);
                    foreach($mains as $main){
                        echo '<div class="mainmu">'. '<a href="' . $main['href'] . '">' . $main['name'] .'</a>';
                            //parent 有資料等於有次選單，
                            $chksub = $menu->count(['parent' => $main['id']]);
                            if($chksub > 0){
                                $subs = $menu->all(['parent' => $main['id']]); //次選單的資料
                                echo '<div class="mw">';
                                foreach ($subs as $sub){
                                    echo '<div class="mainmu2"><a href="' . $sub['href'] .'"></a>'. $sub['name'] . '</div>';
                                }
                                echo '</div>';                                   
                           
                            }                   
                            echo '</div>';
                    }

                    ?>
                </div>
                <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                    <span class="t">進站總人數 :
                    <?php  
					    $total = new DB("total");
					    $tt = $total->find(1);
					    echo $tt['total'];
                    ?>
                    </span>
                </div>
            </div>
        <?php
        $do = (!empty($_GET['do'])) ? $_GET['do'] : 'main';
        $file = 'front/' . $do . ".php";
        if (file_exists($file)) {
            include $file;
        } else {
            include "front/main.php";
        }
        ?>
            <div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
            <script>
                $(".sswww").hover(
                    function() {
                        $("#alt").html("" + $(this).children(".all").html() + "").css({
                            "top": $(this).offset().top - 50
                        })
                        $("#alt").show()
                    }
                )
                $(".sswww").mouseout(
                    function() {
                        $("#alt").hide()
                    }
                )
            </script>
            <div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
                <!--右邊-->
                <button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo(&#39;?do=admin&#39;)">管理登入</button>
                <div style="width:89%; height:480px;" class="dbor">
                    <span class="t botli">校園映象區</span>
                    <div style="text-align:center;margin:10px;" onclick="pp(1)"><img src="icon/up.jpg"></div>
                    <?php

                    $image = new DB("image");
                    $ims =$image->all(['sh'=>1]);
                    foreach($ims as $key => $im){
                        echo "<div style='text-align:center;margin:3px' id='ssaa$key' class='im'>";
                        echo '<img src="img/'. $im['img'].'" style="width:150px;height:103px;border:1px solid orange">';
                        echo "</div>";
                    }
                    ?>


                    <div style="text-align:center;margin:10px;" onclick="pp(2)"><img src="icon/dn.jpg"></div>
                    <script>
                        //現在的頁數
                        var nowpage = 0,
                        //圖片的數量
                            num = <?= $image->count(['sh'=>1]);?>;

                        function pp(x) {
                            var s, t;
                            //現在的頁面-1 >=0 => 現在的頁面-1
                            /*

                            顯示圖片 (一次三張) 圖片有7張
                            所以顯示圖片有以下組合
                            0 1 2
                            1 2 3
                            2 3 4 
                            3 4 5
                            4 5 6 
                            */
                            if (x == 1 && nowpage - 1 >= 0) {
                                nowpage--;
                            }
                            if (x == 2 && nowpage + 1 <= num - 3) {
                                nowpage++;
                            }
                            //把所有class="im"的都先隱藏起來
                            $(".im").hide()
                            //再把要顯示的圖片show出來
                            for (s = 0; s <= 2; s++) {
                                t = s * 1 + nowpage * 1;
                                $("#ssaa" + t).show()
                            }
                        }
                        pp(1)
                    </script>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
        <div style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
            <span class="t" style="line-height:123px;">
            <?php 
				$db = new DB('bottom');
				$ff = $db->find(1);
				echo $ff['bottom'];
			?>
        </span>
        </div>
    </div>

</body>

</html>