<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '首页';
?>
<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title><?= Html::encode($this->title) ?></title>
<link href="/css/base.css" rel="stylesheet">
<link href="/css/index.css" rel="stylesheet">
<link href="/css/m.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
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
        <form action="" method="post" name="searchform" id="searchform">
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
  			        </li>
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
  <div class="jztop"></div>
  <div class="container">
    <div class="bloglist f_l">
      <ul>
      <?php foreach($newsList as $key=>$val){?>
        <li>
          <h3 class="blogtitle"><span><a href="" title="" target="_blank" class="classname"><?php echo $val['menu_name']?></a></span><a href="" target="_blank"></a></h3>
          <div class="bloginfo"><span class="blogpic"><a href="" title=""><img src="/upload/<?php echo $val['news_img']?>" alt=""></a></span>
            <p><?php echo substr($val['news_desc'],0,150).'......'?></p>
          </div>
          <div class="autor"><span class="lm f_l"></span><span class="dtime f_l"><?php echo date('Y-m-d',strtotime($val['add_time']))?></span><span class="viewnum f_l">浏览（<?php echo $val['news_browse_num']?>）</span><span class="f_r"><a href="javascript:;" class="more" value="<?php echo $val['news_id']?>" onclick="check(<?php echo $val['news_id']?>)">阅读原文&gt;&gt;</a></span></div>
     
        </li>
      <?php } ?>
      </ul>
    </div>
    <div class="r_box f_r">
      <div class="tit01">
        <h3 class="tit">关注我</h3>
        <div class="">
          <ul>
            <li style="margin-top:5px;margin-bottom:5px;"><a href="#" target=""><b>我的电话:</b></a><span style="margin-left:8px;font-size:16px;"><font color='575757'>188****3605</font></span></li>
            <li style="margin-top:5px;margin-bottom:5px;"><a class="" href="" target=""><b>我的邮箱:</b></a><span style="margin-left:8px;font-size:16px;"><font color='575757'>3056425753@qq.com</font></span></li>
            <li style="margin-top:5px;margin-bottom:5px;"><a class="" href="#" target=""><b>我的QQ:</b></a><span style="margin-left:8px;font-size:16px;"><font color='575757'>305****753</font></span></li>
          </ul>
        </div>
      </div>
      <!--tit01 end-->
      
      <div class="tuwen">
        <h3 class="tit">图文推荐</h3>
        <ul>
          <?php foreach($recommandList as $k=>$v){ ?>
            <li><a href="/"><i><img src="/upload/<?php echo $v['news_img']?>"></i><b><?php echo $v['news_title']?></b></a>
              <p><span class="tulanmu"><a href="/"><?php echo $v['news_label']?></a></span><span class="tutime"><?php echo date('Y-m-d',strtotime($v['add_time']))?></span></p>
            </li>
          <?php } ?>
        </ul>
      </div>
      <div class="ph">
        <h3 class="tit">点击排行</h3>
        <ul class="rank">
          <?php foreach($rankList as $k=>$v){?>
            <li><a href="<?php echo $v['news_link']?>" title="<?php echo $v['news_title']?>" target="_blank"><?php echo $v['news_title']?></a></li>
          <?php } ?>
        </ul>
      </div>
      <div class="ad"> <img src="/images/03.jpg"> </div>
    </div>
  </div>
  <!-- container代码 结束 -->
  <div class="jzend"></div>
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
<script>
    function check(news_id){
        window.location.href="/index.php?r=index/detail&news_id="+news_id;
    }
</script>
