<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\modules\roles\models\ACLRole;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\news\models\searches\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'text:ntext',
            'time',
            'author',
            'img',
            // 'title',
            // 'short',

            [
				'class' => 'yii\grid\ActionColumn',
			],
        ],
    ]); ?>
