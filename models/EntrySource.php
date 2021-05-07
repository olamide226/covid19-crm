<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%hgsf_entry_source}}".
 *
 * @property int $id
 * @property string $source_name
 *
 * @property hgsfConversations[] $hgsfConversations
 */
class EntrySource extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hgsf_entry_source';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['source_name'], 'required'],
            [['source_name'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            // 'id' => 'ID',
            'source_name' => 'Entry Source Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function gethgsfConversations()
    {
        return $this->hasMany(hgsfConversations::className(), ['entry_source_id' => 'id']);
    }
}
