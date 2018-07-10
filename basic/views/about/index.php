<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '关于Me';
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
      <div class="logo f_l">江南墨卷</div>
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
        <h2 class="nh1"><span>您现在的位置是：<a href="/" target="_blank">网站首页</a>>><a href="#" target="_blank">关于Me</a></span><b>个人简介</b></h2>
        <div class="f_box">
          <p class="a_title">个人简介</p>
          <p class="p_title"></p>
        </div>
        <ul class="about_content">
          <p> 人生就是一个得与失的过程，而我却是一个幸运者，得到的永远比失去的多。生活的压力迫使我放弃了轻松的前台接待，放弃了体面的编辑，换来虽有些蓬头垢面的工作，但是我仍然很享受那些熬得只剩下黑眼圈的日子，因为我在学习使用Photoshop、Flash、Dreamweaver、ASP、PHP、JSP...中激发了兴趣，然后越走越远....</p>
          <p>Life is a process of gain and loss, but I am a lucky person, and I always gain more than I lose. The pressure of life forced me to give up the easy reception, give up decent editors, and exchange for some unkempt work, but I still enjoy the days that have only left the black eye, because I am interested in learning to use Photoshop, Flash, Dreamweaver, ASP, PHP, JSP... The farther away...</p>
          <p><img src="/images/index3.jpeg"></p>
          <p>“冥冥中该来则来，无处可逃”。 </p>
        </ul>
        
        <!-- container代码 结束 --> 
      </div>
    </div>
    <div class="blank"></div>
  </div>
  <!-- container代码 结束 -->
  
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
