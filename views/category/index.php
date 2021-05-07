<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p><?= Html::a('Create Category', ['create'], ['class' => 'btty']) ?></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'category_name',

            ['class' => 'yii\grid\ActionColumn','template'=>'{view} {update}',
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
