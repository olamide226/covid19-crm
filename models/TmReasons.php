<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tm_reasons".
 *
 * @property int $id
 * @property string $reasons
 *
 * @property TmVerification[] $tmVerifications
 */
class TmReasons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tm_reasons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reasons'], 'required'],
            [['reasons'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reasons' => 'Reasons',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTmVerifications()
    {
        return $this->hasMany(TmVerification::className(), ['reason' => 'id']);
    }
}
