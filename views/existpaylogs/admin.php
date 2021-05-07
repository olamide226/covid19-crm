<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category;
use app\models\Product;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConversationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unresolved Call Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conversations-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

 <?php //$cc = Yii::$app->mailer->compose()
    // ->setFrom('admin@ebis.com.ng')
    // ->setTo('olamideadebayo2001@gmail.com')
    // ->setSubject('Message Is Live!!')
    // ->setTextBody('Delete Plixx')
    // // ->setHtmlBody('<b>HTML content</b><h2>Hello</h2>')
    // ->send(); //returns 1 if successful
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            [
              'label' => 'Priority',
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
            // 'ticket_number',
            // 'ticket_status',
            // 'member_id',
            'phone_no',
            // 'product.product_name',
        //     [
        //     'attribute' => 'user_id',
        //     'label' => 'Created By',
        //     'value' => function($model, $index, $dataColumn) {
        //         return $model->user->username;
        //     }
        // ],
            'sla_due_time:datetime',
            'sla_level',
            //'phone_number',
            //'amount',
            //'source',
            //'categories',
            //'agent_name',
            //'date_paid',
            //'member_id',
            //'fraud_suspected',
            //'action:ntext',

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
</div>
