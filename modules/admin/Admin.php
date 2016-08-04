<?php

namespace app\modules\admin;
use yii\base\Module;

/**
 * admin module definition class
 */
class Admin extends Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';
    public $defaultRoute  = 'default/index';
    public $layout="main";
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

        // custom initialization code goes here
    }
}
