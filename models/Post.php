<?php

namespace app\models;

use Yii;

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
            [['create_date'], 'safe'],
            [['title', 'desc', 'picture'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'category_id' => 'Category ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'desc' => 'Desc',
            'content' => 'Content',
            'picture' => 'Picture',
            'status' => 'Status',
            'create_date' => 'Create Date',
        ];
    }
}
