<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '个人相册';
?>
<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title><?= Html::encode($this->title) ?></title>
<link href="/css/base.css" rel="stylesheet">
<link href="/css/main.css" rel="stylesheet">
<link href="/css/m.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="/js/modernizr.js"></script>
<![endif]-->
<script type="text/javascript" src="/js/jquery.js"></script>
<script>
window.onload = function ()
{
	var oH2 = document.getElementsByTagName("h2")[0];
	var oUl = document.getElementsByTagName("ul")[0];
	oH2.onclick = function ()
	{
		var style = oUl.style;
		style.display = style.display == "block" ? "none" : "block";
		oH2.className = style.display == "block" ? "open" : ""
	}
}
</script>
</head>
<body>
<div id="wrapper">
<header>
  <div class="headtop"></div>
  <div class="contenttop">
    <div class="logo f_l">XX--XX</div>
    <div class="search f_r">
      <form action="/e/search/index.php" method="post" name="searchform" id="searchform">
        <input name="keyboard" id="keyboard" class="input_text" value="请输入关键字" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入关键字'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入关键字'}" type="text">
        <input name="show" value="title" type="hidden">
        <input name="tempid" value="1" type="hidden">
        <input name="tbname" value="news" type="hidden">
        <input name="Submit" class="input_submit" value="搜索" type="submit">
      </form>
    </div>
    <div class="blank"></div>
    <nav>
      <div  class="navigation">
        <ul class="menu">
          <?php foreach($menuList as $key => $val){ ?>
          			<li>
  				      	<a href="/index.php?r=index/label&menu_name=<?php echo $val['menu_name']?>"><?php echo $val['menu_name'];?></a>
                  <ul>
                      <?php 
                        if(!empty($val['son'])){ 
                          foreach($val['son'] as $k=>$v){
                      ?>
                        <li><a href="/index.php?r=index/label&menu_name=<?php echo $v['menu_name']?>"><?php echo $v['menu_name'];?></a></li>
                      <?php 
                          }
                        }
                      ?>
                  </ul>
              <?php
                }
              ?>
        </ul>
      </div>
    </nav>
    <SCRIPT type=text/javascript>
	// Navigation Menu
	$(function() {
		$(".menu ul").css({display: "none"}); // Opera Fix
		$(".menu li").hover(function(){
			$(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown("normal");
		},function(){
			$(this).find('ul:first').css({visibility: "hidden"});
		});
	});
</SCRIPT> 
  </div>
</header>
<div class="container">
  <div class="con_content">
    <div class="about_box">
      <h2 class="nh1"><span>您现在的位置是：<a href="/index.php?r=index/index" target="">网站首页</a>>><a href="" target="">个人相册</a></span><b>个人相册</b></h2>
      <div class="lispic">
        <ul>
          <?php foreach($picList as $k=>$v){ ?>
            <li><a href=""><i><img src="/myphoto/<?php echo $v['pic_url']?>"></i><span>图片展示</span></a></li>
          <?php } ?>
        </ul>
      </div>
      <!-- <div class="pagelist"><a href="/">首页</a><a href="/">上一页</a><a href="/">下一页</a><a href="/">尾页</a></div> -->
    </div>
  </div>
  <div class="blank"></div>
  <!-- container代码 结束 -->
  

</div>
  <footer>
    <div class="footer">
      <div class="f_l">
        <p>All Rights Reserved 版权所有：<a href="http://www.baidu.com">XXX</a> 备案号：京ICP备888888888号</p>
      </div>
      <div class="f_r textr">
        <p>Design by DanceSmile</p>
      </div>
    </div>
  </footer>
</body>
</html>