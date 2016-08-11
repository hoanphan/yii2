<?php

namespace app\models;

use app\modules\admin\models\User;
use Yii;
use yii\debug\components\search\matchers\Base;
use yii\helpers\BaseUrl;
use yii\helpers\Url;

/**
 * This is the model class for table "post".
 *
 * @property integer $post_id
 * @property integer $category_id
 * @property integer $user_id
 * @property string $title
 * @property string $desc
 * @property string $content
 * @property string $picture
 * @property integer $status
 * @property string $create_date
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'user_id', 'title', 'desc', 'content', 'picture'], 'required'],
            [['category_id', 'user_id', 'status'], 'integer'],
            [['content'], 'string'],
            /*[['create_date'], 'safe'],*/
            [['title', 'desc', 'picture'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => Yii::t('app','Post ID'),
            'category_id' => Yii::t('app','Category ID'),
            'user_id' => Yii::t('app','User ID'),
            'title' => Yii::t('app','Title'),
            'desc' => Yii::t('app','Desc'),
            'content' => Yii::t('app','Content'),
            'picture' => Yii::t('app','Picture'),
            'status' => Yii::t('app','Status'),
            'create_date' => Yii::t('app','Create Date')
        ];
    }
    public function getNameCategory($id)
    {
        $category= Category::findOne(['category_id'=>$id]);
        return $category["name"] ;
    }
    public function getUser($id)
    {
        $user=User::findOne($id);
        return $user["fullname"];
    }
    public function getUrlPicture($path)
    {
      return   BaseUrl::home().Yii::$app->params['uploadPath'].$path;
    }
    public static function getPostForCategory($id)
    {
        return Post::find(['category_id'=>$id])->orderBy(['post_id'=>'SORT_DESC'])->limit(1)->all();
    }
    public static function getUrlToPicture($url)
    {

        if(strpos($url,'http')>0)
            return $url;
        else
            return BaseUrl::home().Yii::$app->params['uploadPath'].$url;
    }

}
