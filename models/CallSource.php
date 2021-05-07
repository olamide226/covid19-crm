<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hgsf_call_source".
 *
 * @property int $id
 * @property string $name
 *
 * @property hgsfConversations[] $hgsfConversations
 */
class CallSource extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hgsf_call_source';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function gethgsfConversations()
    {
        return $this->hasMany(hgsfConversations::className(), ['call_source_id' => 'id']);
    }
}
