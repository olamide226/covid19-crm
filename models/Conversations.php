<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ecrm_conversations".
 *
 * @property int $id
 * @property int $ticket_number contains number generated from 'generator' table in format 201806060001(bigint)
 * @property string $ticket_status
 * @property string $customer_name
 * @property string $phone_no
 * @property string $member_id
 * @property string $entry_category category of information whether it is correct, incomplete call, wrong info by customers..etc
 * @property string $association
 * @property string $amount_paid
 * @property string $date_paid date BOI customer claims to have paid
 * @property int $comment_id complaints and comments by customers..(mostly predefined)
 * @property string $other_comment
 * @property string $cc_agent_response
 * @property string $fraud_status
 * @property string $cc_agent_action
 * @property int $user_id CC Agent ID who created the form
 * @property int $entry_source_id Means of communication used to reach Agents. i.e Call, Sms, Chat…
 * @property int $call_source_id
 * @property int $category_id identifier ID for respective forms.  enquiry = 4, fraud = 5, kwikcash = 6, loan reconciliations = 1, dta = 2, aggregator = 3
 * @property string $agent_phone_no third party agent phone number
 * @property string $agent_name third party Agent name
 * @property string $payment_medium means of payment. Mostly used in fraud
 * @property int $product_id This is either marketmoni or tradermoni
 * @property string $entry_date timestamp when the agent logged information
 * @property string $created_date actual date customer called to drop information to be logged.
 * @property string $updated_date
 *
 * @property EcrmCallSource $callSource
 * @property EcrmComment $comment
 * @property EcrmCategory $category
 * @property EcrmEntrySource $entrySource
 * @property EcrmProduct $product
 */
class Conversations extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ecrm_conversations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone_no','ticket_number', 'comment_id', 'entry_source_id', 'call_source_id', 'category_id', 'product_id', 'sla_urgency','state_id'], 'integer','message' => '{attribute} should be filled with appropriate value'],
            [['product_id','entry_source_id', 'category_id','ticket_status','comment_id','entry_category'], 'required'],
            [[ 'created_date','user_id','sla_id','sla_urgency','sla_due_time','cbr_amt_repaid','cbr_amt_due','cbr_amt_default','cbflag'], 'safe'],
            [['ticket_status',], 'string', 'max' => 32],
            [['customer_name', 'phone_no', 'member_id', 'amount_paid', 'agent_name'], 'string', 'max' => 100],
            [['entry_category', 'fraud_status', 'payment_medium'], 'string', 'max' => 50],
            [['association'], 'string', 'max' => 200],
            [['date_paid'], 'string', 'max' => 20],
            [['other_comment', 'cc_agent_response', 'cc_agent_action'], 'string', 'max' => 2000],
            [['agent_phone_no'], 'string', 'max' => 30],
            [['call_source_id'], 'exist', 'skipOnError' => true, 'targetClass' => CallSource::className(), 'targetAttribute' => ['call_source_id' => 'id']],
            [['comment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['comment_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['entry_source_id'], 'exist', 'skipOnError' => true, 'targetClass' => EntrySource::className(), 'targetAttribute' => ['entry_source_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['sla_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sla::className(), 'targetAttribute' => ['sla_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ticket_number' => 'Ticket Number',
            'ticket_status' => 'Ticket Status',
            'customer_name' => 'Customer Name',
            'phone_no' => 'Phone No',
            'member_id' => 'Member ID',
            'entry_category' => 'Entry Category',
            'association' => 'Association',
            'amount_paid' => 'Amount Paid',
            'date_paid' => 'Date Paid',
            'cbr_amt_repaid' => 'Amount RePaid(CBR)',
            'cbr_amt_due' => 'Amount Due(CBR)',
            'cbr_amt_default' => 'Amount Default(CBR)',
            'comment_id' => 'Comment',
            'other_comment' => 'Other Comment',
            'cc_agent_response' => 'Response',
            'fraud_status' => 'Fraud Status',
            'cc_agent_action' => 'Agent Action',
            'user_id' => 'User',
            'entry_source_id' => 'Entry Source',
            'call_source_id' => 'Call Source',
            'category_id' => 'Category',
            'agent_phone_no' => 'Agent Phone Number',
            'agent_name' => 'Agent Name',
            'payment_medium' => 'Payment Medium',
            'product_id' => 'Product Type',
            'created_date' => 'Created Date',
            'state_id' => 'State',
            'sla_id' => 'SLA',
            'sla_level' => 'Level',
            'sla_urgency' => 'Priority',
            'sla_due_time' => 'SLA Due Time',
        ];
    }

    public function userGroup($id)
    {
       $usergroup = Yii::$app->db->createCommand("SELECT get_user_group($id) as a")->queryOne();
       return $usergroup['a'];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCallSource()
    {
        return $this->hasOne(CallSource::className(), ['id' => 'call_source_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(Comment::className(), ['id' => 'comment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntrySource()
    {
        return $this->hasOne(EntrySource::className(), ['id' => 'entry_source_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getSla()
    {
        return $this->hasOne(Sla::className(), ['id' => 'sla_id']);
    }
}
