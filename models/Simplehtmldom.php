<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "simplehtmldom".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $link
 * @property string $image
 * @property string $content
 * @property string $topic;
 */
class Simplehtmldom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simplehtmldom';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['title', 'description', 'link', 'image', 'content','topic'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'link' => 'Link',
            'image' => 'Image',
            'content' => 'Content',
            'topic'=>'Topic',
        ];
    }
    public function substring($str)
    {
        $i=strpos($str,'<img');
        return substr($str,0,$i);
    }
}
