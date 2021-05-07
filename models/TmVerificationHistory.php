<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tm_verification_history".
 *
 * @property int $id
 * @property int $candidateid
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
 * @property int $batch_id
 * @property string $agent_firstname
 * @property string $agent_lastname
 * @property string $agent_middlename
 * @property int $status 1 = Accepted | 2 = rejected
 * @property int $reason
 * @property string $valid_rating y = yes | n = no
 * @property int $user_id
 * @property string $created_on
 * @property string $updated_on
 */
class TmVerificationHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tm_verification_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['candidateid', 'firstname', 'lastname', 'middlename', 'gender', 'dob', 'phone', 'bvn', 'tradetype', 'trade_subtype_name', 'home_address', 'date_enumerated', 'current_bank', 'account_number', 'state', 'lga', 'cluster_location', 'trademoni_id', 'batch_id', 'agent_firstname', 'agent_lastname', 'agent_middlename', 'reason', 'valid_rating'], 'required'],
            [['id','candidateid', 'phone', 'batch_id','status', 'reason', 'user_id'], 'integer'],
            [['created_on', 'updated_on'], 'safe'],
            [['firstname', 'lastname', 'middlename', 'dob', 'bvn', 'date_enumerated', 'current_bank', 'account_number', 'state', 'lga', 'cluster_location', 'trademoni_id', 'agent_firstname', 'agent_lastname', 'agent_middlename'], 'string', 'max' => 20],
            [['gender'], 'string', 'max' => 10],
            [['tradetype'], 'string', 'max' => 50],
            [['trade_subtype_name', 'home_address'], 'string', 'max' => 100],
            [['valid_rating'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'candidateid' => 'Candidateid',
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
            'status' => 'Status',
            'reason' => 'Reason',
            'valid_rating' => 'Valid Rating',
            'user_id' => 'User ID',
            'created_on' => 'Created On',
            'updated_on' => 'Updated On',
        ];
    }
}
