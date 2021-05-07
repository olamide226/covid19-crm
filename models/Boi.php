<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "boi".
 *
 * @property string $customer_name
 * @property int $phone_number
 * @property string $association
 * @property string $member_id
 * @property string $state
 * @property string $amount
 * @property int $tenure
 * @property int $bvn
 * @property string $mou_status
 * @property string $first_due_date
 * @property string $amount_due
 * @property string $amount_re_paid
 * @property string $amount_in_default
 * @property string $sub_aggregator
 * @property string $aggregator
 * @property string $beneficiary_institution
 * @property int $nuban
 * @property string $date_requested
 * @property string $status
 * @property string $reason_for_rejection
 * @property string $last_change_date
 * @property string $pending_icu_confirmation_date
 * @property string $pending_customer_confirmation_date
 * @property string $pending_f_ire_confirmation_date
 * @property string $pending_approval_date
 * @property string $due_for_disbursement_date
 * @property string $loan_disbursed_successfully_date
 * @property string $offer_declined_date
 * @property string $risk_request_denied_date
 * @property string $request_denied_date
 * @property string $not_qualified_date
 */
class Boi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'boi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone_number', 'tenure', 'bvn', 'nuban'], 'integer'],
            [['first_due_date'], 'safe'],
            [['customer_name'], 'string', 'max' => 51],
            [['association'], 'string', 'max' => 197],
            [['member_id', 'beneficiary_institution'], 'string', 'max' => 21],
            [['state'], 'string', 'max' => 11],
            [['amount'], 'string', 'max' => 16],
            [['mou_status'], 'string', 'max' => 12],
            [['amount_due', 'amount_re_paid', 'amount_in_default'], 'string', 'max' => 10],
            [['sub_aggregator', 'aggregator'], 'string', 'max' => 35],
            [['date_requested', 'last_change_date', 'pending_icu_confirmation_date', 'pending_customer_confirmation_date', 'pending_f_ire_confirmation_date', 'pending_approval_date', 'due_for_disbursement_date', 'loan_disbursed_successfully_date', 'offer_declined_date', 'risk_request_denied_date', 'request_denied_date', 'not_qualified_date'], 'string', 'max' => 17],
            [['status'], 'string', 'max' => 27],
            [['reason_for_rejection'], 'string', 'max' => 86],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'customer_name' => 'Customer Name',
            'phone_number' => 'Phone Number',
            'association' => 'Association',
            'member_id' => 'Member ID',
            'state' => 'State',
            'amount' => 'Amount',
            'tenure' => 'Tenure',
            'bvn' => 'BVN',
            'mou_status' => 'MOU Status',
            'first_due_date' => 'First Due Date',
            'amount_due' => 'Amount Due',
            'amount_re_paid' => 'Amount Repaid',
            'amount_in_default' => 'Amount In Default',
            'sub_aggregator' => 'Sub Aggregator',
            'aggregator' => 'Aggregator',
            'beneficiary_institution' => 'Beneficiary Institution',
            'nuban' => 'NUBAN',
            'date_requested' => 'Date Requested',
            'status' => 'Status',
            'reason_for_rejection' => 'Reason For Rejection',
            'last_change_date' => 'Last Change Date',
            'pending_icu_confirmation_date' => 'Pending ICU Confirmation Date',
            'pending_customer_confirmation_date' => 'Pending Customer Confirmation Date',
            'pending_f_ire_confirmation_date' => 'Pending FI Reconfirmation Date',
            'pending_approval_date' => 'Pending Approval Date',
            'due_for_disbursement_date' => 'Due For Disbursement Date',
            'loan_disbursed_successfully_date' => 'Loan Disbursed Successfully Date',
            'offer_declined_date' => 'Offer Declined Date',
            'risk_request_denied_date' => 'Risk Request Denied Date',
            'request_denied_date' => 'Request Denied Date',
            'not_qualified_date' => 'Not Qualified Date',
        ];
    }
}
