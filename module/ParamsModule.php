<?php

namespace pashkinz92\params\module;

class ParamsModule extends \yii\base\Module
{
    const MODULE = "params";

    public $controllerNamespace = 'pashkinz92\params\module\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
