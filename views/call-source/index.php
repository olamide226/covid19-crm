<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CallSourceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Call Sources';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="call-source-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Call Source', ['create'], ['class' => 'btty']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',

            ['class' => 'yii\grid\ActionColumn','template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<button class=" btty-sm" ><i class="fa fa-eye"></i></button>', $url, [
                                    'title' => Yii::t('app', 'View Record')
                        ]);
                    },
                ],
                ],
            ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
