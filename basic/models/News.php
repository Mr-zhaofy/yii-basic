<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $population
 */
class News extends \yii\db\ActiveRecord
{
	 /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_img', 'news_desc', 'news_label'], 'string', 'max' => 255]
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'news_id' => 'NEWS ID',
            'news_img' => 'NEWS Img',
            'news_desc' => 'NEWS Desc',
            'news_label' => 'NEWS Label',
            'news_browse_num' => 'NEWS Browse_num'
        ];
    }

    public function upload(){
        return $this->news_img->saveAs('upload/' . $this->news_img->baseName . '.' . $this->news_img->extension);
    }


    /**
     * 获取所有文章列表
     * @return [type] [description]
     */
    public static function getNewsList(){
        $news = static::find()->select('*')->innerJoin('menu','news.news_type=menu.menu_id')->where("news.news_id > 0")->orderBy('news.add_time DESC')->limit(5)->asArray()->all();
        return $news;
    }

    /**
     * 获取文章详情
     * @param  [type] $news_id [description]
     * @return [type]          [description]
     */
    public static function getNewsDetail($news_id){
        $news_detail = static::find()->where("news_id = :id",[':id'=>$news_id])->asArray()->one();
        return $news_detail;
    }

    /**
     * 更新文章浏览量
     * @param  [type] $num     [description]
     * @param  [type] $news_id [description]
     * @return [type]          [description]
     */
    public static function updateOneNum($num,$news_id){
        $res = static::updateAll(['news_browse_num' => $num], 'news_id = '.$news_id);
        return $res;
    }

    /**
     * 获取图文推荐列表
     * @return [type] [description]
     */
    public static function getRecommandList(){
        $res = static::find()->where("is_recommend = :is",[':is'=>1])->orderBy('news_id DESC')->limit(5)->asArray()->all();
        return $res;
    }

    /**
     * 获取点击排行列表
     * @return [type] [description]
     */
    public static function getRankList(){
        $res = static::find()->orderBy('news_browse_num DESC')->limit(10)->asArray()->all();
        return $res;
    }

    /**
     * 获取所有的技术文章
     * @return [type] [description]
     */
    public static function getAllTechnologyArticle($type){
        $res = static::find()->where("news_type = :type",[':type'=>$type])->orderBy("news_id DESC")->asArray()->all();
        return $res;
    }

    /**
     * 获取所有的娱乐文章
     * @param  [type] $type [description]
     * @return [type]       [description]
     */
    public static function getAllEntertainmentArticle($type){
        $res = static::find()->where("news_type = :type",[':type'=>$type])->orderBy("news_id DESC")->asArray()->all();
        return $res;
    }
}