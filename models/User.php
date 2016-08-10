<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $fullname
 * @property string $phone
 * @property integer $status
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'fullname', 'phone'], 'required'],
            [['status'], 'integer'],
            [['username', 'password', 'email', 'fullname', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app','User ID'),
            'username' => Yii::t('app', 'Username'),
            'password' =>  Yii::t('app','Password'),
            'email' =>  Yii::t('app','Email'),
            'fullname' =>  Yii::t('app','Fullname'),
            'phone' =>  Yii::t('app','Phone'),
            'status' =>  Yii::t('app','Status'),
        ];
    }
    public function getStatusText($status)
    {
        if($status==0)
        {
            return "Inactive";
        }
        elseif ($status==1)
        {
            return "Active";
        }
        else
            return"Unknown";
    }
}
