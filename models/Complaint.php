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
class Complaint extends \yii\db\ActiveRecord
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
            [['category_id','call_source_id','user_id','entry_source_id','state_id','phone_no'],'integer'],
            [['customer_name', 'comment_id',  'user_id','product_id', 'entry_source_id','cc_agent_response'], 'required'],
            [['entry_date','comment_id', 'lga_id','sub_category','cc_agent_response','ticket_number'], 'safe'],
            [['cc_agent_action','details'], 'string'],
             // ['call_source_id', 'default', 'value' => null],
            [['customer_name',], 'string', 'max' => 60],
            [['association'], 'string', 'max' => 100],
            [['other_comment', 'cc_agent_response'], 'string', 'max' => 300],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['entry_source_id'], 'exist', 'skipOnError' => true, 'targetClass' => EntrySource::className(), 'targetAttribute' => ['entry_source_id' => 'id']],
            [['comment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['comment_id' => 'id']],
		    [['state_id'], 'exist', 'skipOnError' => true, 'targetClass' => State::className(), 'targetAttribute' => ['state_id' => 'id']],
            [['lga_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lga::className(), 'targetAttribute' => ['lga_id' => 'id']],
            [['sub_category'], 'exist', 'skipOnError' => true, 'targetClass' => SubCategory::className(), 'targetAttribute' => ['sub_category' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            // 'id' => 'ID',
            'customer_name' => 'Caller Name',
            'phone_no' => 'Phone Number',
            'ticket_number' => 'Ticket Number',
            'entry_date' => 'Date',
            'association' => 'Town',
            'comment_id' => 'Complaint',
            'other_comment' => 'Other Comments',
            'cc_agent_response' => 'Response',
            'user_id' => 'Created By',
            'category_id' => 'Category',
            'product_id' => 'Issue Type',
            'entry_source_id' => 'Source',
            'call_source_id' => 'Call Source',
            'cc_agent_action' => 'Action',
	        'details'=> 'Details',
            'state_id' => 'State',
            'lga_id' => 'LGA',
            'sub_category' => 'Call Category'
        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getEntrySource()
    {
        return $this->hasOne(EntrySource::className(), ['id' => 'entry_source_id']);
    }

    public function getComment()
    {
        return $this->hasOne(Comment::className(), ['id' => 'comment_id']);
    }
    public function getState()
    {
        return $this->hasOne(State::className(), ['id' => 'state_id']);
    }
    public function getLga()
    {
        return $this->hasOne(Lga::className(), ['id' => 'lga_id']);
    }
    public function getSubCategory()
    {
        return $this->hasOne(SubCategory::className(), ['id' => 'sub_category']);
    }
}
