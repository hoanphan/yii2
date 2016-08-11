<?php
/**
 * Created by PhpStorm.
 * User: HOANDHTB
 * Date: 8/10/2016
 * Time: 4:50 PM
 */

namespace app\controllers;


use yii\web\Controller;

class ViewController extends Controller
{
    public function actionView($id)
    {
       return $this->render('index');
    }
}