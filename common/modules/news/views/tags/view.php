<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
// use common\modules\roles\models\ACLRole;

/* @var $this yii\web\View */
/* @var $model common\modules\news\models\Tags */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => Yii::t('ML', 'Tags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tags-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-success'])?>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary'])?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'title',
        ],
    ]) ?>

</div>
