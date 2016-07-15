<?php

namespace pashkinz92\params\module;

use pashkinz92\params\models\Config;

class ParamsModule extends \yii\base\Module
{
    const MODULE = "params";

    public $controllerNamespace = 'pashkinz92\params\module\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here

        $params = Config::find()->asArray()->all();
        if( $params )
        {
            foreach ($params as $param)
            {
                \Yii::$app->params[$param['title']] = $param['value'];
            }
        }
    }
}
