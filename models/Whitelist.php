<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "whtl".
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $middlename
 * @property string $gender
 * @property string $dob
 * @property string $phone
 * @property string $bvn
 * @property string $tradetype
 * @property string $trade_subtype_name
 * @property string $home_address
 * @property string $date_enumerated
 * @property string $current_bank
 * @property string $account_number
 * @property string $state
 * @property string $lga
 * @property string $cluster_location
 * @property string $trademoni_id
 * @property string $batch_id
 * @property string $agent_firstname
 * @property string $agent_lastname
 * @property string $agent_middlename
 */
class Whitelist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'whtl';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['firstname', 'lastname', 'middlename', 'gender', 'dob', 'phone', 'bvn', 'tradetype', 'trade_subtype_name', 'date_enumerated', 'current_bank', 'account_number', 'state', 'lga', 'cluster_location', 'trademoni_id', 'batch_id', 'agent_firstname', 'agent_lastname', 'agent_middlename'], 'string', 'max' => 200],
            [['home_address'], 'string', 'max' => 2000],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'middlename' => 'Middlename',
            'gender' => 'Gender',
            'dob' => 'Dob',
            'phone' => 'Phone',
            'bvn' => 'Bvn',
            'tradetype' => 'Tradetype',
            'trade_subtype_name' => 'Trade Subtype Name',
            'home_address' => 'Home Address',
            'date_enumerated' => 'Date Enumerated',
            'current_bank' => 'Current Bank',
            'account_number' => 'Account Number',
            'state' => 'State',
            'lga' => 'Lga',
            'cluster_location' => 'Cluster Location',
            'trademoni_id' => 'Trademoni ID',
            'batch_id' => 'Batch ID',
            'agent_firstname' => 'Agent Firstname',
            'agent_lastname' => 'Agent Lastname',
            'agent_middlename' => 'Agent Middlename',
        ];
    }
}
