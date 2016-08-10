<?php

namespace app\modules\admin;

use yii\base\Module;
use yii\helpers\Url;
use yii\web\User;

/**
 * admin module definition class
 */
class Admin extends Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';
    public $defaultRoute = 'login/index';
    public $layout = "main";

    public function beforeAction($action)
    {

        return parent::beforeAction($action);
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        \Yii::$app->setComponents([
            'user' => [
                'class' => User::className(),
                'identityClass' => 'app\models\User',
                'enableAutoLogin' => true,
                'loginUrl' => ['admin/login/index'],
            ]
        ]);
    }
}
