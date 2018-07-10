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
class AboutController extends Controller
{
	//关闭默认布局layout
	public $layout = false;
	//关闭post请求的CSRF验证拦截
	public $enableCsrfValidation=false;

	/**
	 * 关于Me  首页
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
		return $this->render('index',['menuList'=>$father_menu_list]);
	}

	/**
	 * 个人简介
	 * @return [type] [description]
	 */
	public function actionIntroduction(){
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
		return $this->render('index',['menuList'=>$father_menu_list]);
	}


	public function actionPhoto(){
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
		//获取相册所有图片
		$pic_list = Photo::getAllPhotoList();
		return $this->render('photo',['menuList'=>$father_menu_list,'picList'=>$pic_list]);
	}

	/**
	 * 上传图片
	 * @return [type] [description]
	 */
	public function actionPic(){
		$model = new Photo();
        return $this->render('pic', ['model' => $model]);
	}

	/**
	 * 执行上传
	 * @return [type] [description]
	 */
	public function actionDoo(){
		$model = new Photo();
		$request = Yii::$app->request;
		$post=$request->post('Upload');
		$arr =  $model->pic_url = UploadedFile::getInstance($model,'pic_url');
		 // var_dump($arr);die;
		  if ($model->upload()) {
                $pic_url = $arr->name;
                $connection = \Yii::$app->db;
            	$result=$connection->createCommand()->insert('photo', [
                'pic_url' => $pic_url,
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
}