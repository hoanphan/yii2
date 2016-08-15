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
 * @property integer $category_idCategoryTranslate
 * @property string $nameCategoryTranslate
 * @property string $create_dateCategoryTranslate
 * @property integer $statusCategoryTranslate
 */
class CategoryTranslate extends \yii\db\ActiveRecord
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
    public function behaviors() {
        return [
            'ml' => [
                'class'      => MultiLanguageBehavior::className(),
                'attributes' => [
                    'nameCategoryTranslate',
                    'create_dateCategoryTranslate'
                    ]
            ],
        ];
    }

    /**
     * @return MultiLanguageQuery
     */
    public static function find() {
        return new MultiLanguageQuery(get_called_class());
    }
    public static function findOneTranslated($condition) {
        return is_array($condition) ? self::find()->where($condition)->translate()->one() : self::find()->where(['id' => $condition])->translate()->one();
    }



    public function rules()
    {
        return [
            [['nameCategoryTranslate'], 'required'],
            [['create_dateCategoryTranslate'], 'safe'],
            [['statusCategoryTranslate'], 'integer'],
            [['nameCategoryTranslate'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $attribute=[
            'category_idCategoryTranslate' =>'ID',
            'nameCategoryTranslate' =>  Translate::name(),
            'create_dateCategoryTranslate' => Translate::create_date(),
            'statusCategoryTranslate'=>'Status'

        ];
        foreach(MultiLanguageHelper::attributeNames($this) as $mlAttribute){
            $attributeLabels[$mlAttribute] = Translate::$mlAttribute();
        }
        return $attributeLabels;
    }
    public function getListCategory()
    {
       $ar= array();
        $ar[0]="Inactive";
        $ar[1]="Active";
        return $ar;
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
