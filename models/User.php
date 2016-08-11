<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

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
class User extends \yii\db\ActiveRecord implements IdentityInterface
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

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }




    public static function findByUsername($username)
    {
        /*foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }*/

        $user = User::find()->where(['username' => $username])->one();

        return $user;
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
    public static function getListStatus()
    {
        $arr=array(0=>'Inactive',1=>'Active');
        return $arr;
    }
    public function validatePassword($password) {
        return ($this->password) ? Yii::$app->security->validatePassword($password, $this->password) : true;
    }
}
