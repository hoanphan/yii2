<?php

namespace app\models;

use navatech\language\components\MultiLanguageBehavior;
use navatech\language\components\MultiLanguageQuery;
use navatech\language\helpers\MultiLanguageHelper;
use navatech\language\Translate;
use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property string $create_date
 * @property  string $language
 * @property integer $status
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'ml' => [
                'class' => MultiLanguageBehavior::className(),
                'attributes' => [
                    'name',
                ]
            ],
        ];
    }

    /**
     * @return MultiLanguageQuery
     */
    public static function find()
    {
        return new MultiLanguageQuery(get_called_class());
    }

    public static function findOneTranslated($condition)
    {
        return is_array($condition) ? self::find()->where($condition)->translate()->one() : self::find()->where(['id' => $condition])->translate()->one();
    }


    public function rules()
    {
        return [
            [['create_date','name'], 'safe'],
            [['status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $attribute = [
            'id' => 'ID',
            'name' => Translate::name(),
            'create_date' => Translate::create_date(),
            'status' => 'Status'

        ];
        foreach (MultiLanguageHelper::attributeNames($this) as $mlAttribute) {
            $attributeLabels[$mlAttribute] = Translate::$mlAttribute();
        }
        return $attributeLabels;
    }

    public function getListCategory()
    {
        $ar = array();
        $ar[0] = "Inactive";
        $ar[1] = "Active";
        return $ar;
    }

    public function getStatusText($status)
    {
        if ($status == 0) {
            return "Inactive";
        } elseif ($status == 1) {
            return "Active";
        } else
            return "Unknown";
    }
}
