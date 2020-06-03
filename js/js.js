// JavaScript Document
$(document).ready(function(e) {
    $(".mainmu").mouseover(
		function()
		{
			$(this).children(".mw").stop().show()
		}
	)
	$(".mainmu").mouseout(
		function ()
		{
			$(this).children(".mw").hide()
		}
	)
});
function lo(x)
{
	location.replace(x)
}

function op(x,y,url)
{
	// x.y放的是某一種選擇器
	//使用淡入效果来顯示一個隐藏的$(x)元素
	$(x).fadeIn()
	if(y)
	$(y).fadeIn()
	if(y&&url)
	$(y).load(url)
	//在y這個選擇器中載入url這個網址
}

function cl(x)
{
	$(x).fadeOut();
}