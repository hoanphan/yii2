<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Video;
use app\modules\admin\modelSeach\VideoSeach;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * VideoController implements the CRUD actions for Video model.
 */
class VideoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Video models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VideoSeach();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Video model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Video model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    private  function saveVideos($fileVideo)
    {
        $path=null;

        $url_video = Yii::$app->security->generateRandomString().".".$fileVideo->extension;

        // the path to save file, you can set an uploadPath
        // in Yii::$app->params (as used in example below)
        $path = Yii::$app->params['uploadVideo'] . $url_video;

        if($fileVideo->saveAs($path,true))
            return $url_video;
    }
    private  function saveImage($fileImager)
    {
        $path=null;

        $imager_last = Yii::$app->security->generateRandomString().".".$fileImager->extension;

        // the path to save file, you can set an uploadPath
        // in Yii::$app->params (as used in example below)
        $path = Yii::$app->params['uploadImageVideo'] .  $imager_last;
        if($fileImager->saveAs($path,true))
            return $imager_last;

    }
    public function actionCreate()
    {
        $model = new Video();
        if($model->load(Yii::$app->request->post())) {
            $fileVideo=UploadedFile::getInstanceByName('Video[url_video]');
            $fileImager=UploadedFile::getInstanceByName('Video[imager_last]');
            $model->user_id=Yii::$app->user->id;
            $model->imager_last=$this->saveImage($fileImager);
            $model->url_video=$this->saveVideos($fileVideo);
            if ($model->save()) {
                 return $this->redirect(['index']);
             } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Video model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->video_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Video model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Video model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Video the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Video::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
