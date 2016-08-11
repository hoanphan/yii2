<?php

namespace app\controllers;

use app\models\Category;
use app\models\Coment;
use app\models\Post;
use app\models\Simplehtmldom;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'comment' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $post_hots=Simplehtmldom::find()->orderBy(['id'=>'SORT_DESC'])->limit(3)->all();

        return $this->render('index',array('hots'=>$post_hots));
    }

    /**
     * login action.
     *
     * @return string
     */
    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = Simplehtmldom::find()->limit(4)->all();
        $files= Simplehtmldom::find()->all();
        return $this->render('contact', [
            'models' => $model,'files'=>$files
        ]);
    }
    public function actionView($id)
    {
        return $this->render('view',['id'=>$id]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout($id)
    {
        $model=new Coment();
        $post=Post::findOne(['post_id'=>$id]);
        $comment=Coment::find()->where(['post_id'=>$id])->all();

        return $this->render('about',array('post'=>$post,'id'=>$id,'model'=>$model,'comments'=>$comment));
    }

    /**
     *
     */
    public function actionComment()
    {
        if (isset($_POST['Coment'])) {
            $comment = new Coment();
            $comment->post_id = 5;
            $comment->coment=$_POST['Coment']['coment'];
            $comment->name_user=$_POST['Coment']['name_user'];
            $comment->email_user=$_POST['Coment']['email_user'];
            if($comment->save())
            {
                $message= '
                    <strong style="padding: 10px; color: #0b62a4"> ' . $comment->name_user . '</strong>
                    <div style="padding: 15px">
                        ' . $comment->coment . '
                    </div>
                 ';
                echo $message;
            } else {
                echo "error";
            }

        }
        else
        {
            echo 'Loi';
        }
        die;
    }
}
