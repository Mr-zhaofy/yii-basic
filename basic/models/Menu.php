<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * Menu is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class Menu extends ActiveRecord
{

	/**
	 * 返回指定表名
	 * @return [type] [description]
	 */
    public static function tableName()
    {
        return '{{%menu}}';
    }




	//获取所有菜单数据
	public static function getFatherMenuList()
	{
		//查询所有父类菜单
		$father = static::find()->where("menu_parent_id = 0")->asArray()->all();
		return $father;
	}


	public static function getSonMenuList(){
		//查询所有子类菜单
		$son = static::find()->where("menu_parent_id != 0")->asArray()->all();
		return $son;
	} 
}