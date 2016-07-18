<?php

namespace pashkinz92\params\module\controllers;

use yii\web\Controller;
use pashkinz92\params\models\Config;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }


    /**
     * Lists all Config models.
     * @return mixed
     */
    public function actionIndex()
    {
        $params = Config::find()->all();

        return $this->render('index', [
            'params' => $params
        ]);
    }

    /**
     * Updates an existing Config model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        $model = Config::find()->where(['title'=>$_POST['param']])->one();

        if (!$model) {
            return json_encode(['error' => 'param not found']);
        }

        $value = $_POST['value'];
        $valid = $_POST['valid'];
        $msg = "";
        if($valid == "H:i"){
            $time_check = explode(':', $value);
            if ($time_check[0] >= 0 &&
                $time_check[0] <= 23 &&
                strlen($time_check[0]) == 2 &&
                $time_check[1] >= 0 &&
                $time_check[1] <= 59 &&
                strlen($time_check[1]) == 2)
            {

                $model->value = $value;


            } else {
                return json_encode(['error' => 'Wrong format']);

            }
        }else if($valid == "datePicker"){
            $model->value = $value;
        }else if($valid == "phone"){
            $model->value = $value;
            $msg = \Yii::$app->epochtasms->sendSMS('test from admin', $value);
        }else if($valid == 'number'){
            $model->value = (string)(integer)$value;
        }else {
            $model->value = (string)$value;
        }


        if ($model->save()) {
            return json_encode(['ok' => 'ok', 'msg' => $msg]);
        } else {
            return json_encode(['error' => 'saving error']);
        }


        return json_encode(['error' => 'Not valid']);



    }
}
