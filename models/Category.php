<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hgsf_category".
 *
 * @property int $id
 * @property string $category_name
 *
 * @property Conversations[] $hgsfConversations
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hgsf_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name'], 'required'],
            [['category_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConversations()
    {
        return $this->hasMany(Conversations::className(), ['hgsf_category_id' => 'id']);
    }
}
