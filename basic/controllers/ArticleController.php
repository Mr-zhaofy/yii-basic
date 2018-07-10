<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Menu;
use app\models\News;
use app\models\Photo;
use yii\web\UploadedFile;

/**
 * AboutController implements the CRUD actions for Index model.
 */
class ArticleController extends Controller
{
	//关闭默认布局layout
	public $layout = false;
	//关闭post请求的CSRF验证拦截
	public $enableCsrfValidation=false;

	/**
	 * 获取所有的文章列表
	 * @return [type] [description]
	 */
	public function actionIndex(){
		//获取所有父类菜单数据
		$father_menu_list = Menu::getFatherMenuList();
		//获取所有子类菜单数据
		$son_menu_list = Menu::getSonMenuList();
		//循环处理父类下面的子类菜单
		foreach($father_menu_list as $key=>&$val){
			foreach($son_menu_list as $k=>&$v){
				if($v['menu_parent_id'] == $val['menu_id']){
					$father_menu_list[$key]['son'][$k] = $v;
				}else{
					continue;
				}
			}
		}

		//获取所有文章列表
		$article_list = News::getNewsList();
		return $this->render('index',['menuList'=>$father_menu_list,'newsList'=>$article_list]);
	}

	/**
	 * 获取所有技术文章
	 * @return [type] [description]
	 */
	public function actionTechnology(){
		//获取所有技术文章
		$type = 6;
		$tec_list = News::getAllTechnologyArticle($type);
		//获取所有父类菜单数据
		$father_menu_list = Menu::getFatherMenuList();
		//获取所有子类菜单数据
		$son_menu_list = Menu::getSonMenuList();
		//循环处理父类下面的子类菜单
		foreach($father_menu_list as $key=>&$val){
			foreach($son_menu_list as $k=>&$v){
				if($v['menu_parent_id'] == $val['menu_id']){
					$father_menu_list[$key]['son'][$k] = $v;
				}else{
					continue;
				}
			}
		}
		return $this->render('technology',['tecList'=>$tec_list,'menuList'=>$father_menu_list]);
	}


	public function actionEntertainment(){
		//获取所有娱乐文章
		$type = 7;
		$ent_list = News::getAllEntertainmentArticle($type);
		//获取所有父类菜单数据
		$father_menu_list = Menu::getFatherMenuList();
		//获取所有子类菜单数据
		$son_menu_list = Menu::getSonMenuList();
		//循环处理父类下面的子类菜单
		foreach($father_menu_list as $key=>&$val){
			foreach($son_menu_list as $k=>&$v){
				if($v['menu_parent_id'] == $val['menu_id']){
					$father_menu_list[$key]['son'][$k] = $v;
				}else{
					continue;
				}
			}
		}
		return $this->render('entertain',['entList'=>$ent_list,'menuList'=>$father_menu_list]);
	}

}
