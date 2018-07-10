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
class Photo extends \yii\db\ActiveRecord
{
	 /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pic_url'], 'string', 'max' => 255]
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pic_id' => 'PIC ID',
            'pic_url' => 'PIC Url',
        ];
    }

    public function upload(){
        return $this->pic_url->saveAs('myphoto/' . $this->pic_url->baseName . '.' . $this->pic_url->extension);
    }

    /**
     * 获取所有照片
     * @return [type] [description]
     */
    public static function getAllPhotoList(){
    	$res = static::find()->orderBy("pic_id DESC")->limit(8)->asArray()->all();
    	return $res;
    }

}