<?php
namespace app\modules\admin\controllers;

use app\models\Post;
use app\modules\admin\models\AdminLoginForm;
use Yii;
use app\models\Category;
use app\modules\admin\ModelSeach\CategorySeach;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
class LoginController extends Controller
{
    public function hasd($string)
    {
        return md5($string);
    }
    public function actionIndex()
    {
        $this->layout='login';
        $adminLogin=new AdminLoginForm();
        if(isset($_POST['AdminLoginForm']))
        {
            $adminLogin->attributes=$_POST['AdminLoginForm'];
            $adminLogin->password=$this->hasd($adminLogin->password);
            if($adminLogin->login())
            {
               return $this->redirect('admin/default/index')->send();
            }
        }
        return $this->render('index',['model'=>$adminLogin]);
    }
}