<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enquiry".
 *
 * @property int $id
 * @property string $customer_name
 * @property string $phone_no
 * @property string $entry_date
 * @property string $association
 * @property string $comment
 * @property string $other_comment
 * @property string $cc_agent_response
 * @property string $user_id 
 * @property string $entry_source
 * @property string $cc_agent_action
 * @property string $hgsf_category_id
 */
class Paylogs extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hgsf_conversations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id','call_source_id','user_id','entry_source_id','state_id','phone_no','amount_paid'],'integer'],
            [['customer_name', 'comment_id',  'user_id','product_id','cc_agent_response', 'entry_source_id','entry_category', 'ticket_status'], 'required'],
            [['entry_date', 'date_paid','comment_id', 'lga_id','ticket_number','member_id','account_no','bank_id','cbrid'], 'safe'],
            [['cc_agent_action','details','other_comment'], 'string',],
            [['category_id'], 'default', 'value'=> 4],
            [['customer_name','entry_category','ticket_status'], 'string', 'max' => 60],
            [['association'], 'string', 'max' => 100],
            [['account_no'], 'string', 'max' => 10],
            [[ 'cc_agent_response'], 'string', 'max' => 300],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['entry_source_id'], 'exist', 'skipOnError' => true, 'targetClass' => EntrySource::className(), 'targetAttribute' => ['entry_source_id' => 'id']],
            [['comment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['comment_id' => 'id']],
            [['bank_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bank::className(), 'targetAttribute' => ['bank_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']]

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            // 'id' => 'ID',
            'customer_name' => 'Customer Name',
            'phone_no' => 'Phone Number',
            'member_id' => 'Member ID',
            'amount_paid' => 'Amount Pending',
            'ticket_number' => 'Ticket Number',
            'ticket_status' => 'Ticket Status',
            'entry_date' => 'Date',
            'association' => 'Town',
            'comment_id' => 'Complaint',
            'other_comment' => 'Other Comment',
            'cc_agent_response' => 'Response',
            'user_id' => 'User',
            'category_id' => 'Category',
            'entry_category' => 'Entry Category',
            'product_id' => 'Product Type',
            'entry_source_id' => 'Source',
            'call_source_id' => 'Call Source',
            'cc_agent_action' => 'Action',
            'date_paid' => 'Last Payment Date',
            'state_id' => 'State',
            'lga_id' => 'LGA',
            'bank_id' => 'Bank',
            'account_no' => 'Account Number',
		'details'=> 'Details(Institution Name)'
        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function getEntrySource()
    {
        return $this->hasOne(EntrySource::className(), ['id' => 'entry_source_id']);
    }

    public function getComment()
    {
        return $this->hasOne(Comment::className(), ['id' => 'comment_id']);
    }
    public function getBank()
    {
        return $this->hasOne(Bank::className(), ['id' => 'bank_id']);
    }
}
