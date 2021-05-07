<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hgsf".
 *
 * @property int $id
 * @property string $customer_name
 * @property int $phone_number
 * @property string $state
 * @property string $lga
 * @property int $designation
 * @property string $last_pay_date
 * @property string $amount_paid
 * @property string $amount_due
 * @property string $status
 */
class Hgsf extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hgsf';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone_number', ], 'integer'],
            [['customer_name','designation','bank','account_no'], 'string', 'max' => 100],
            [['state'], 'string', 'max' => 30],
            [['lga','member_id'], 'string', 'max' => 50],
            [['last_pay_date'], 'string', 'max' => 40],
            [['amount_paid', 'amount_due', 'status'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            
            'customer_name' => 'Customer Name',
            'phone_number' => 'Phone Number',
            'state' => 'State',
            'lga' => 'LGA',
            'member_id' => 'Member ID',
            'designation' => 'Designation',
            'last_pay_date' => 'Last Pay Date',
            'amount_paid' => 'Amount Paid',
            'amount_due' => 'Amount Due',
            'status' => 'Application Status',
            'account_no' => 'Account Number',
            'bank' => 'Bank',
        ];
    }
}