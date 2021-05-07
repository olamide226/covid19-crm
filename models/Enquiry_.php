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
 * @property string $ecrm_category_id
 */
class Enquiry extends \yii\db\ActiveRecord
{

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
            [['category_id','call_source_id','user_id','entry_source_id','state_id','phone_no'],'integer'],
            [['customer_name', 'comment_id',  'user_id','product_id', 'entry_source_id',], 'required'],
            [['entry_date','comment_id', 'lga_id','sub_category','cc_agent_response'], 'safe'],
            [['cc_agent_action'], 'string'],
             // ['call_source_id', 'default', 'value' => null],
            [['customer_name',], 'string', 'max' => 60],
            [['association'], 'string', 'max' => 100],
            [['other_comment', 'cc_agent_response'], 'string', 'max' => 300],
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
            // 'id' => 'ID',
            'customer_name' => 'Customer Name',
            'phone_no' => 'Phone Number',
            'entry_date' => 'Date',
            'association' => 'Town',
            'comment_id' => 'Comment',
            'other_comment' => 'Other Comments',
            'cc_agent_response' => 'Response',
            'user_id' => 'Created By',
            'category_id' => 'Category',
            'product_id' => 'Product Type',
            'entry_source_id' => 'Source',
            'call_source_id' => 'Call Source',
            'cc_agent_action' => 'Action',
            'state_id' => 'State',
            'lga_id' => 'LGA',
            'sub_category' => 'Customer Category'
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
}
