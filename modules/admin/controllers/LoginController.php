<?php
namespace app\modules\admin\controllers;

use app\modules\admin\models\User;
use app\modules\admin\models\AdminLoginForm;
use Yii;
use app\models\Category;
use app\modules\admin\ModelSeach\CategorySeach;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
class LoginController extends Controller
{
    public function actionIndex()
    {
        $this->layout='login';
        $adminLogin=new AdminLoginForm();
        if(isset($_POST['AdminLoginForm']))
        {
            $adminLogin->attributes=$_POST['AdminLoginForm'];
            if($adminLogin->login())
            {
               return $this->redirect('/admin/default/index')->send();
            }
        }
        return $this->render('index',['model'=>$adminLogin]);
    }
}