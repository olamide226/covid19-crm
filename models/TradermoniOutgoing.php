<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tradermoni_outgoing".
 *
 * @property int $id
 * @property string $name
 * @property int $phone_no
 * @property int $status 0 = rejected | 1 = Accepted | 2 = unacceptable
 * @property string $reason
 */
class TradermoniOutgoing extends \yii\db\ActiveRecord
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
            [['phone_no', 'comment_id'], 'required'],
            [['phone_no','call_type_id'], 'integer'],
            [['user_id'], 'safe'],
            [['call_type_id'], 'default', 'value'=> 2],
            [['entry_source_id'], 'default', 'value'=> 1],
            [['call_source_id'], 'default', 'value'=> 1],
            [['product_id'], 'default', 'value'=> 2],
            [['category_id'], 'default', 'value'=> 6],
            [['user_id'], 'default', 'value'=> Yii::$app->user->id],
            [['customer_name', 'other_comment'], 'string', 'max' => 300],
            [['comment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['comment_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],


        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'customer_name' => 'Name',
            'phone_no' => 'Phone No',
            'comment_id' => 'Status',
            'other_comment' => 'Reason',
        ];
    }

    public function getComment()
    {
        return $this->hasOne(Comment::className(), ['id' => 'comment_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
