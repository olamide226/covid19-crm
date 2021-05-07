<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Comment;
use app\models\Category;
use app\models\Product;
use webvimark\modules\UserManagement\UserManagementModule;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><!--?= Html::encode($this->title) ?--></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p><?= Html::a('Create Comment', ['create'], ['class' => 'btty']) ?></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
                        if ($model->status == 0) {
                            return ['class' => 'danger'];
                        } else { return ['class' => 'success']; }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
              'attribute'=>'comments',
                // ['contentOptions' => ['style' => 'with:100px'],
                // ],
             
            ],
            // 'category.category_name',
            // 'product.product_name',
            [
                    'class'=>'webvimark\components\StatusColumn',
                    'attribute'=>'status',
                    'optionsArray'=>[
                        [1, UserManagementModule::t('back', 'Active'), 'success'],
                        [0, UserManagementModule::t('back', 'Inactive'), 'warning'],
                    ],
                ],
                      [
              'attribute'=>'product_id',
              'filter'=>ArrayHelper::map(Product::find()->asArray()->all(), 'id', 'product_name'),
              'label'=>'Issue',
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
[
  // 'label' => 'Priority',
  'attribute'=>'sla_urgency',
  'filter' => ArrayHelper::map([['id'=>'1','name'=>'High'],['id'=>'0','name'=>'Normal']],'id','name'),
  'value' => function ($model)
  {
    if ($model->sla_urgency == 1) {
      return 'High';
    } else {
      return 'Normal';
    }
  }
],

            ['class' => 'yii\grid\ActionColumn','template' => '{view}{update}',
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
