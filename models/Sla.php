<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hgsf_sla_master".
 *
 * @property int $id
 * @property int $product_id
 * @property int $category_id
 * @property int $is_fraud
 * @property int $is_urgent
 * @property int $duration duration in Hours
 * @property string $user_group
 * @property int $level
 *
 * @property hgsfConversations[] $hgsfConversations
 */
class Sla extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */


    public static function tableName()
    {
        return 'hgsf_sla';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'category_id', 'is_fraud', 'is_urgent', 'duration', 'level' ], 'integer'],
            [['product_id', 'category_id', 'is_fraud', 'is_urgent', 'duration', 'level','user_group'], 'required'],
            [['level','duration'], 'checkUniq','on'=>'create'],
            // [['duration'], 'checkExist','on'=>'update'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],

                    ];
    }
    public function checkUniq()//You should only create one sla rule
        {
            if(!empty($this->level)){

                  $exists = Yii::$app->db->createCommand("Select EXISTS(select 1 from hgsf_sla
                  where product_id = $this->product_id AND category_id= $this->category_id AND is_urgent= $this->is_urgent AND level= $this->level AND is_fraud= $this->is_fraud  )")
                  ->queryScalar();
                    if($exists){
                      $this->addError('level','Oops! A similar record already exists..trying changing the level');
                    }
                }
        }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product',
            'category_id' => 'Category',
            'is_fraud' => 'Fraud Category ??',
            'is_urgent' => 'Priority',
            'duration' => 'duration(in Hours)',
            'user_group' => 'User Group',
            'level' => 'Level',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConversations()
    {
        return $this->hasMany(Conversations::className(), ['sla_id' => 'id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
