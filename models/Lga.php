<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hgsf_lga".
 *
 * @property int $id
 * @property string $lga
 * @property int $state_id
 */
class Lga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hgsf_lga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'state_id'], 'integer'],
            [['lga'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lga' => 'Lga',
            'state_id' => 'State ID',
        ];
    }
}
