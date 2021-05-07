<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kwikcash".
 *
 * @property int $id
 * @property string $customer_name
 * @property string $phone_no
 * @property string $comment
 * @property string $cc_agent_response
 * @property string $created_by
 * @property string $entry_date
 * @property string $action
 */
class Kwikcash extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecrm_conversations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_name', 'phone_no', 'comment', 'cc_agent_response'], 'required'],
            [['cc_agent_response'], 'string'],
            [['entry_date','user_id'], 'safe'],
            [['customer_name', 'comment'], 'string', 'max' => 100],
            [['phone_no'], 'string', 'max' => 11],
            [['action'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_name' => 'Customer Name',
            'phone_no' => 'Phone Number',
            'comment' => 'comment',
            'cc_agent_response' => 'cc_agent_response',
            'user_id' => 'Created By',
            'entry_date' => 'Date Created',
            'action' => 'Action',
        ];
    }
}
