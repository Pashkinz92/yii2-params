<?php

namespace pashkinz92\params;

use yii\web\AssetBundle;

class ParamsAsset extends AssetBundle
{
    public $sourcePath = '@pashkinz92/params/assets';
    //public $baseUrl = '@web';

    public $js = [
        'js/params.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
