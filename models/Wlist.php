<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gcc_whtl".
 *
 * @property int $id
 * @property string $enumerator
 * @property string $agentname
 * @property int $batch_id
 * @property string $rejection_reason
 * @property string $firstname
 * @property string $lastname
 * @property string $middlename
 * @property string $gender
 * @property string $dob
 * @property string $phone
 * @property string $bvn
 * @property string $tradetype
 * @property string $tradesubtype
 * @property string $state
 * @property string $lga
 * @property string $home_address
 * @property string $current_bank
 * @property string $account_number
 * @property string $gps
 * @property string $cluster_location
 * @property string $picture
 * @property string $facial_picture
 * @property string $certificate_picture
 * @property string $current_status
 * @property string $date_submission
 * @property int $disbursement
 * @property string $date_disbursement
 * @property double $amount_due
 * @property double $amount_repaid
 * @property double $amount_default
 * @property string $createdon
 * @property int $is_callable
 * @property string $date_called
 * @property string $call_description
 * @property int $call_not_reachable
 * @property int $is_applied
 * @property string $date_applied
 * @property string $is_disbursed
 * @property string $trademoni_id
 * @property string $smile_reference
 * @property string $date_enumerated
 * @property string $date_batch_verify
 * @property int $wallet_map_id
 * @property string $wallet_name
 * @property int $senatorial_id
 * @property int $geopolitical_id
 * @property string $agent_id
 * @property string $is_cashedout
 * @property string $date_cashout
 * @property string $region
 */
class Wlist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gcc_whtl_crm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'batch_id', 'disbursement', 'is_callable', 'call_not_reachable', 'is_applied', 'wallet_map_id', 'senatorial_id', 'geopolitical_id'], 'integer'],
            [['rejection_reason', 'call_description'], 'string'],
            [['firstname', 'lastname', 'dob', 'phone', 'home_address', 'account_number', 'gps', 'picture', 'certificate_picture', 'date_submission', 'disbursement', 'date_disbursement'], 'required'],
            [['dob', 'date_submission', 'date_disbursement', 'createdon', 'date_called', 'date_applied', 'date_enumerated', 'date_batch_verify', 'date_cashout'], 'safe'],
            [['amount_due', 'amount_repaid', 'amount_default'], 'number'],
            [['enumerator'], 'string', 'max' => 35],
            [['agentname'], 'string', 'max' => 41],
            [['firstname', 'lastname', 'middlename', 'lga', 'current_bank', 'current_status', 'wallet_name'], 'string', 'max' => 20],
            [['gender'], 'string', 'max' => 6],
            [['phone', 'bvn'], 'string', 'max' => 11],
            [['tradetype', 'smile_reference'], 'string', 'max' => 30],
            [['tradesubtype'], 'string', 'max' => 200],
            [['state'], 'string', 'max' => 70],
            [['home_address',], 'string', 'max' => 250],
            [['account_number'], 'string', 'max' => 10],
            [['gps', 'cluster_location'], 'string', 'max' => 50],
            [['picture', 'facial_picture', 'certificate_picture', 'trademoni_id'], 'string', 'max' => 15],
            [['is_disbursed', 'is_cashedout', 'region'], 'string', 'max' => 13],
            [['agent_id'], 'string', 'max' => 9],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'enumerator' => 'Enumerator',
            'agentname' => 'Agentname',
            'batch_id' => 'Batch ID',
            'rejection_reason' => 'Rejection Reason',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'middlename' => 'Middlename',
            'gender' => 'Gender',
            'dob' => 'Dob',
            'phone' => 'Phone',
            'bvn' => 'Bvn',
            'tradetype' => 'Tradetype',
            'tradesubtype' => 'Tradesubtype',
            'state' => 'State',
            'lga' => 'Lga',
            'home_address' => 'Home Address',
            'current_bank' => 'Current Bank',
            'account_number' => 'Account Number',
            'gps' => 'Gps',
            'cluster_location' => 'Cluster Location',
            'picture' => 'Picture',
            'facial_picture' => 'Facial Picture',
            'certificate_picture' => 'Certificate Picture',
            'current_status' => 'Current Status',
            'date_submission' => 'Date Submission',
            'disbursement' => 'Disbursement',
            'date_disbursement' => 'Date Disbursement',
            'amount_due' => 'Amount Due',
            'amount_repaid' => 'Amount Repaid',
            'amount_default' => 'Amount Default',

            'date_enumerated' => 'Date Enumerated',
            'date_batch_verify' => 'Date Batch Verify',
            'wallet_map_id' => 'Wallet Map ID',
            'wallet_name' => 'Wallet Name',
            'senatorial_id' => 'Senatorial ID',
            'geopolitical_id' => 'Geopolitical ID',
            'agent_id' => 'Agent ID',
            'is_cashedout' => 'Is Cashedout',
            'date_cashout' => 'Date Cashout',
            'region' => 'Region',
        ];
    }
}
