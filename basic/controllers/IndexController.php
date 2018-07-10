<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Menu;
use app\models\News;
use yii\web\UploadedFile;
use yii\data\Pagination;

/**
 * IndexController implements the CRUD actions for Index model.
 */
class IndexController extends Controller
{
	//关闭默认布局layout
	public $layout = false;
	//关闭post请求的CSRF验证拦截
	public $enableCsrfValidation=false;

	/**
	 * 首页
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
		//获取所有新闻数据
		$news_list = News::getNewsList();
		// $model = new News;
		// $data = $model->getNewsList();
		// $pages = new Pagination([
		// 	'totalCount' =>$data->count(),
		// 	'pageSize' =>5, //pageSize 每页显示的条数
		// ]); 
		// $models = $data->offset($pages->offset)->limit($pages->limit)->asArray()->all();
		//获取所有的图文推荐列表
		$recommand_list = News::getRecommandList();
		//获取点击排行列表
		$rank_list = News::getRankList();
		//渲染页面
		return $this->render('index',['menuList'=>$father_menu_list,'newsList'=>$news_list,'recommandList'=>$recommand_list,'rankList'=>$rank_list]);
	}

	/**
	 * 渲染页面
	 * @return [type] [description]
	 */
	public function actionNews(){
		$model = new News();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            return $this->render('addnews', ['model' => $model]);
        }

	}

	/**
	 * 执行添加
	 * @return [type] [description]
	 */
	public function actionDo(){
		$arr = $_POST['News'];
		$model = new News();
		$request = Yii::$app->request;
		$post=$request->post('Upload');
		$news_browse_num = $arr['news_browse_num'];
		$news_desc = $arr['news_desc'];
		$news_label = $arr['news_label'];
		$news_title = $arr['news_title'];
		$news_link = $arr['news_link'];
		 $arr =  $model->news_img = UploadedFile::getInstance($model,'news_img');
		 // var_dump($arr);die;
		  if ($model->upload()) {
                $news_img = $arr->name;
                 $connection = \Yii::$app->db;
            	$result=$connection->createCommand()->insert('news', [
                'news_desc' => $news_desc,
                'news_label' => $news_label,
                'news_browse_num' => $news_browse_num,
                'news_img' => $news_img,
                'news_title' => $news_title,
                'news_link' => $news_link,
                'add_time' => date('Y-m-d H:i:s'),
            ])->execute();
            if($result)
            {
              echo "添加成功";	
            }
            else
            {
            	echo "添加失败";
            }
            }

	}

	/**
	 * 文章详情
	 * @return [type] [description]
	 */
	public function actionDetail(){
		$request = Yii::$app->request;
		$news_id=$request->get('news_id');
		//根据文章id获取文章详情
		$detail = News::getNewsDetail($news_id);
		//浏览量+1
		$num = $detail['news_browse_num'] + 1;
		//更新浏览量
		$res = News::updateOneNum($num,$news_id);
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

		return $this->render('detail',['detail'=>$detail,'menu'=>$father_menu_list]); 
	}

	/**
	 * 标签切换
	 * @return [type] [description]
	 */
	public function actionLabel(){
		$request = Yii::$app->request;
		$menu_name = $request->get('menu_name');
		//根据菜单名称指向不同的控制器方法
		if( $menu_name == '网站首页'){
			return $this->redirect(array('/index/index'));
		}else if( $menu_name == '我的日记'){
			return $this->redirect(array('/diary/index'));
		}else if( $menu_name == '学习笔记'){
			return $this->redirect(array('/diary/studynote'));
		}else if( $menu_name == '个人日记'){
			return $this->redirect(array('/diary/personaldiary'));
		}else if( $menu_name == '收藏文章'){
			return $this->redirect(array('/article/index'));
		}else if( $menu_name == '技术文章'){
			return $this->redirect(array('/article/technology'));
		}else if( $menu_name == '娱乐文章'){
			return $this->redirect(array('/article/entertainment'));
		}else if( $menu_name == '关于Me'){
			return $this->redirect(array('/about/index'));
		}else if( $menu_name == '个人简介'){
			return $this->redirect(array('/about/introduction'));
		}else if( $menu_name == '个人相册'){
			return $this->redirect(array('/about/photo'));
		}
	}
}