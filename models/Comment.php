<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%hgsf_comment}}".
 *
 * @property int $id
 * @property string $comments
 * @property int $category_id
 * @property int $product_id
 * @property int $status
 *
 * @property hgsfConversations[] $hgsfConversations
 */
class Comment extends \yii\db\ActiveRecord
{

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%hgsf_comment}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comments', 'product_id'], 'required'],
            [['category_id', 'product_id', 'status','sla_urgency'], 'safe'],
            [['comments'], 'string', 'max' => 2000],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['sub_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubCategory::className(), 'targetAttribute' => ['sub_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comments' => 'Comments',
            'category_id' => 'Category',
            'product_id' => 'Product',
            'status' => 'Status',
            'sla_urgency' => 'Priority Level',
            'sub_category_id' => 'Sub Category',
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
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function getConversations()
    {
        return $this->hasMany(Conversations::className(), ['comment_id' => 'id']);
    }
    public function getSubCategory()
    {
        return $this->hasOne(SubCategory::className(), ['id' => 'sub_category_id']);
    }
}
