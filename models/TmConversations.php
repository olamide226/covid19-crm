<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tm_conversations".
 *
 * @property int $id
 * @property string $name
 * @property int $phone
 * @property string $amount_default
 * @property string $amount_paid
 * @property string $amount_due
 * @property string $address
 * @property string $cluster_location
 * @property string $gender
 * @property string $state
 * @property string $region
 */
/* Comment Mapping
-- the following comment map to the respective columns on the database
     question (frontend)               ||  column(backend)
Why haven't you paid back your loan: A || question_a
When will you pay back: B              || question_b
What mode of repayment do you prefer: C || question_c
What Amount do you plan to repay?: D   || question_d
When do you plan to complete payment(days): E || question_c
 */
class TmConversations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tm_conversations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone','call_status'], 'required'],
            [['phone','user_id','call_status','question_e','question_d'], 'integer'],
            [['amount_default', 'amount_paid', 'amount_due'], 'number'],
            [['name', 'address'], 'string', 'max' => 300],
            [['cluster_location','tradetype'], 'string', 'max' => 200],
            [['gender'], 'string', 'max' => 10],
            [['state'], 'string', 'max' => 100],
            [['question_a','question_b','question_c','question_d','question_a2'], 'string', 'max' => 200],
            [['region'], 'string', 'max' => 50],
            [['other_comment'], 'string', 'max' => 500],
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
            'phone' => 'Phone',
            'amount_default' => 'Amount Default',
            'amount_paid' => 'Amount Paid',
            'amount_due' => 'Amount Due',
            'address' => 'Address',
            'cluster_location' => 'Cluster Location',
            'tradetype' => 'Trade Type',
            'gender' => 'Gender',
            'state' => 'State',
            'region' => 'Region',
            'call_status' => 'Call Status',
            'other_comment' => 'Other Comments',
            'question_a2' => "Is Customer Willing to pay back?",
            'question_a' => "A) Why haven't you paid back your loan:",
            'question_b' => "B) When will you pay back:",
            'question_c' => "C) What mode of repayment do you prefer:",
            'question_d' => "D) What Amount do you plan to repay?",
            'question_e' => "E) When do you plan to complete payment(days):",
        ];
    }
}
