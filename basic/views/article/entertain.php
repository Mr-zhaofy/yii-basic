<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '娱乐文章';
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
      <h2 class="nh1"><span>您现在的位置是：<a href="/" target="">网站首页</a>>><a href="#" target="">收藏文章</a></span><b>娱乐文章</b></h2>
      <div class="dtxw box">
      <?php foreach($entList as $k=>$v){?>
      	<li>
          <div class="dttext">
            <div class="xwpic"><a href="/"><img src="/upload/<?php echo $v['news_img']?>"></a></div>
            <ul>
              <h2><a href="/index.php?r=index/detail&news_id=<?php echo $v['news_id']?>"><?php echo $v['news_title']?></a></h2>
              <p><?php echo substr($v['news_desc'],0,94);?></p>
              <div class="binfo"><span class="lm"><a href="/"><?php echo $v['news_label']?></a></span><span>已有<?php echo $v['news_browse_num']?>人阅读</span><span class="atime"><?php echo date('Y-m-d',strtotime($v['add_time']))?></span></div>
            </ul>
          </div>
        </li>
      <?php } ?>        
      </div>
      <div class="pagelist"><a href="/">首页</a><a href="/">上一页</a><a href="/">下一页</a><a href="/">尾页</a></div>
    </div>
  </div>
  <div class="blank"></div>
  <!-- container代码 结束 -->
 </div> 
  <footer>
    <div class="footer">
      <div class="f_l">
        <p>All Rights Reserved 版权所有：<a href="http://www.yangqq.com">xxx个人博客</a> 备案号：蜀ICP备00000000号</p>
      </div>
      <div class="f_r textr">
        <p>Design by DanceSmile</p>
      </div>
    </div>
  </footer>

</body>
</html>