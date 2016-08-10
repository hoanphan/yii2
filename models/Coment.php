<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coment".
 *
 * @property integer $id_coment
 * @property string $name_user
 * @property string $email_user
 * @property string $coment
 * @property string $date_create
 * @property integer $post_id
 */
class Coment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_user', 'email_user', 'coment', 'post_id'], 'required'],
            [['date_create'], 'safe'],
            [['post_id'], 'integer'],
            [['name_user', 'email_user', 'coment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_coment' => 'Id Coment',
            'name_user' => 'Name User',
            'email_user' => 'Email User',
            'coment' => 'Coment',
            'date_create' => 'Date Create',
            'post_id' => 'Post ID',
        ];
    }
}
