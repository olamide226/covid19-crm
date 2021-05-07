<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "casetwo".
 *
 * @property int $id
 * @property string $customer_name
 * @property string $phone_no
 * @property string created_date
 * @property string $association
 * @property string $comment
 * @property string $other_comment
 * @property string $cc_agent_response
 * @property string $cc_agent_action
 * @property string $user_id
 * @property string $entry_source
 * @property string $ecrm_category_id
 * @property string $agent_phone_no
 * @property string $agent_name
 */
class Casetwo extends \yii\db\ActiveRecord
{
  public $username;
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
          [[ 'user_id','category_id','product_id','state_id','phone_no'], 'integer'],
          [['user_id', 'entry_source_id','ticket_number', 'ticket_status', 'customer_name','phone_no','comment_id','cc_agent_response'], 'required'],
          [['customer_name', 'phone_no', 'agent_name'], 'string', 'max' => 100],
          [['entry_category',  'entry_source_id','call_source_id'], 'string', 'max' => 50],
          [['association','ticket_status'], 'string', 'max' => 200],
          [['other_comment', 'cc_agent_response', 'cc_agent_action'], 'string', 'max' => 2000],
          [['agent_phone_no'], 'string', 'max' => 30],
          [['cbflag'], 'string', 'max' => 1],
          [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
          [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
          [['entry_source_id'], 'exist', 'skipOnError' => true, 'targetClass' => EntrySource::className(), 'targetAttribute' => ['entry_source_id' => 'id']],
          [['comment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['comment_id' => 'id']],
      ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone_no' => 'Customer Phone Number',
            'customer_name' => 'Customer Name',
            'entry_date' => 'Date',
            'association' => 'Association',
            'comment_id' => 'Complaints',
            'product_id' => 'Product',
            'other_comment' => 'Other Comments',
            'cc_agent_response' => 'Response',
            'cc_agent_action' => 'Action',
            'user_id' => 'User ID',
            'entry_source_id' => 'Entry Source',
            'category_id' => 'Category',
            'call_source_id' => 'Call Source',
            'agent_phone_no' => 'Agent Phone Number',
            'agent_name' => 'Agent Name',
            'state_id' => 'State',
            'ticket_status' => 'Ticket Status',
            'ticket_number' => 'Ticket Number',
        ];
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public function getComment()
    {
        return $this->hasOne(Comment::className(), ['id' => 'comment_id']);
    }

    public function getEntrySource()
    {
        return $this->hasOne(EntrySource::className(), ['id' => 'entry_source_id']);
    }
}
