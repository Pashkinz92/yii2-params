<?php

namespace pashkinz92\params\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%params}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $value
 */
class Config extends \yii\db\ActiveRecord
{
    static $params = false;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%config}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
            [['value'], 'string', 'max' => 10000],
            [['title'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => 'Параметр',
            'value' => 'Значение',
            'desc' => 'Описание',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert))
        {
            return true;
        }
        else
        {
            return false;
        }
    }


    static function getParam($title)
    {
        if(!self::$params){
            $t_param = Config::find()->asArray()->all();
            self::$params = [];
            foreach ($t_param as $i){
                self::$params[$i['title']] = $i;
            }
        }
        return self::$params[$title]['value'];
        /*
        if(empty($title)){
            return null;
        }
        return Config::find()->where(['title'=>$title])->one();*/
    }




}
