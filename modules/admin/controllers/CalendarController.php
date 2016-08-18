<?php
/**
 * Created by PhpStorm.
 * User: HOANDHTB
 * Date: 8/18/2016
 * Time: 4:26 PM
 */

namespace app\modules\admin\controllers;


use yii\web\Controller;

class CalendarController extends Controller
{
    public function actionIndex()
    {

        return $this->render('index');
    }
    public function actionAjax()
    {
       echo "aaaa";
    }
}