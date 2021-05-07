<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hgsf_sub_category".
 *
 * @property int $id
 * @property string $sub_category
 */
class SubCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hgsf_sub_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sub_category'], 'required'],
            [['sub_category'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sub_category' => 'Sub Category',
        ];
    }
}
