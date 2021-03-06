<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '详情';
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
</head>
<body>
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
      
      <div id="mnav">
    <h2><span class="navicon"></span></h2>
  </div>
      
      <nav>
        <div  class="navigation">
          <ul class="menu">
            <?php foreach($menu as $key => $val){ ?>
          			<li>
  				      	<a href=""><?php echo $val['menu_name'];?></a>
                  <ul>
                      <?php 
                        if(!empty($val['son'])){ 
                          foreach($val['son'] as $k=>$v){
                            echo "<li><a href=''>".$v['menu_name']."</a></li>";
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
        <h2 class="nh1"><span>您现在的位置是：<a href="/index.php?r=index/index" target="">网站首页</a>>><a href="#" target="">文章详情</a></span><b>文章详情</b></h2>
        <div class="f_box">
          <p class="a_title"><?php echo $detail['news_title']?></p>
          <p class="p_title"></p>
          <!--  <p class="box_p"><span>发布时间：2017-07-07 15:12:42</span><span>作者：唐孝文</span><span>来源：稽查支队</span><span>点击：111056</span></p>--> 
          <!-- 可用于内容模板 --> 
        </div>
        <ul class="about_content">
          <p> <?php echo $detail['news_desc']?></p>
          <p><img src="/upload/<?php echo $detail['news_img']?>"></p>
        </ul>
      </div>
    </div>
    <div class="blank"></div>
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
</div>
</body>
</html>
