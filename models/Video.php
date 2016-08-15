<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property integer $video_id
 * @property integer $user_id
 * @property string $video_title
 * @property string $url_video
 * @property string $create_date
 * @property integer $status
 * @property string $imager_last
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'video_title', 'url_video', 'imager_last'], 'required'],
            [['user_id', 'status'], 'integer'],
            [['create_date'], 'safe'],
            [['imager_last'], 'string'],
            [['video_title', 'url_video'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'video_id' => 'Video ID',
            'user_id' => 'User ID',
            'video_title' => 'Video Title',
            'url_video' => 'Url Video',
            'create_date' => 'Create Date',
            'status' => 'Status',
            'imager_last' => 'Imager Last',
        ];
    }
}
