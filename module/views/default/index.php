<?php

    use yii\helpers\Html;

    use pashkinz92\params\models\Config;

    use kartik\date\DatePicker;

    \pashkinz92\params\ParamsAsset::register($this);

    /* @var $this yii\web\View */

    $this->title = 'Параметры';
?>
<div class="params">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php foreach ($params as $key=>$param){?>
        <div class="row clearfix" style="margin-top: 15px;">
            <div class="pull-left col-sm-6 param_title">
                <?= $param['title']; ?><br>
                <small><?= $param['param_desc']; ?> / <?= $param['valid']; ?></small>
            </div>

            <div class="pull-left col-sm-4 param_value" id="num_<?= $key; ?>">

                <?php if($param['valid'] == 'datePicker'){?>
                    <? echo DatePicker::widget([
                        'name' => $param['title'],
                        'value' => $param['value'],
                        'type' => DatePicker::TYPE_COMPONENT_APPEND,
                        'pluginOptions' => [
                            'format' => 'dd.mm.yyyy',
                            'multidate' => true,
                            'multidateSeparator' => ';',

                        ]
                    ]); ?>
                <?php }else{?>
                    <input type="text" class="form-control" data-valid="<?= $param['valid']; ?>" data-param="<?= $param['title']; ?>" data-old="<?= $param['value']; ?>" value="<?= $param['value']; ?>" />
                <? } ?>

            </div>
            <div class="pull-left col-sm-2 param_value" id="num_<?= $key; ?>">
                <div class="btn btn-success hide"
                     data-valid="<?= $param['valid']; ?>"
                     data-param="<?= $param['title']; ?>"
                     data-old="<?= $param['value'];?> ">
                    Сохранить
                </div>
            </div>
        </div>
    <? } ?>

</div>