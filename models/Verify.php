<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ecrm_ver_log".
 *
 * @property int $id
 * @property int $candidate_id Tradetype:TYP | Subtype:SUB | Cluster:CL | Name:NM | TradermoniID:TID | DOB:DOB | State:ST | lga:LGA | bank:BNK | account no:ACC | phone:PHN | address:ADD
 * @property string $validator
 * @property int $status
 * @property int $comment_id
 * @property int $user_id
 * @property string $date_created
 *
 * @property Whtl $candidate
 * @property EcrmComment $comment
 * @property User $user
 */
class Verify extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ecrm_ver_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['candidate_id', 'status', 'user_id'], 'required'],
            [['candidate_id', 'status', 'comment_id', 'user_id'], 'integer'],
            
            [['validator'], 'string', 'max' => 100],
            [['candidate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Whitelist::className(), 'targetAttribute' => ['candidate_id' => 'id']],
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
            'id' => 'ID',
            'candidate_id' => 'Candidate',
            'validator' => 'Validator',
            'status' => 'Status',
            'comment_id' => 'Comment',
            'user_id' => 'User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCandidate()
    {
        return $this->hasOne(Whitelist::className(), ['id' => 'candidate_id']);
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
