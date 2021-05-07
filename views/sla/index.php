<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Product;
use app\models\Category;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SlaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'SLA';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="sla-index">

    <h3><!--?= Html::encode($this->title) ?--></h3>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create SLA', ['create'], ['class' => 'btty']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'product.product_name',
            // 'category.category_name',
            [
    'attribute'=>'product_id',
    'filter'=>ArrayHelper::map(Product::find()->asArray()->all(), 'id', 'product_name'),
    'value' => function($model, $index, $dataColumn) {
            return $model->product->product_name;
            }
          ],
      [
    'attribute'=>'category_id',
    'filter'=>ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'category_name'),
    'value' => function($model, $index, $dataColumn) {
      return $model->category->category_name;
        }
    ],

            // 'is_fraud',
            [
              'label' => 'Fraud??',
                'attribute'=>'is_fraud',
              'filter' => ArrayHelper::map([['id'=>'1','name'=>'Yes'],['id'=>'0','name'=>'No']],'id','name'),
              'value' => function ($model)
              {
                if ($model->is_fraud == 1) {
                  return 'Yes';
                } else {
                  return 'No';
                }
              }
            ],
            // 'is_fraud',
            [
              'label' => 'Priority',
              'attribute'=>'is_urgent',
              'filter' => ArrayHelper::map([['id'=>'1','name'=>'High'],['id'=>'0','name'=>'Normal']],'id','name'),
              'value' => function ($model)
              {
                if ($model->is_urgent == 1) {
                  return 'High';
                } else {
                  return 'Normal';
                }
              }
            ],
            'level',

            // 'is_urgent',
            // 'duration',
            ['attribute'=>'duration',
            'value'=> function ($model)
            {
              return $model->duration . ' hours';
            }],
            // 'user_group',
            [
              'attribute' => 'user_group',
              'filter' =>  ArrayHelper::map(Yii::$app->db->createCommand('SELECT name, description FROM auth_item WHERE auth_item.type=1')->queryAll(),
                'name', 'description'),
                'value' => function ($model)
                {
                  return $model->user_group;
                }
            ],
            //'level',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view}{update}',
              'buttons' => [
                'view' => function ($url, $model) {
                  return Html::a('<button class=" btty-sm" ><i class="fa fa-eye"></i></button>', $url, [
                              'title' => Yii::t('app', 'View Record')
                  ]);
                },
                'update' => function ($url, $model){
                  return Html::a('<button class=" btty-sm" style="margin-top:5px;" ><i class="fa fa-pen"></i></button>', $url, [
                    'title' => Yii::t('app', 'Update Record')
                  ]);
                }
              ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
