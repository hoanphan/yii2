<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $category_id
 * @property string $name
 * @property string $create_date
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
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['create_date'], 'safe'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => Yii::t('app','Category ID'),
            'name' =>  Yii::t('app','Name'),
            'create_date' =>  Yii::t('app','Create Date'),
            'status' =>  Yii::t('app','Status'),
        ];
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
