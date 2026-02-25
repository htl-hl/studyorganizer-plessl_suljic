<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Fach $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Faches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fach-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'fachkennung' => $model->fachkennung], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'fachkennung' => $model->fachkennung], [
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
            'fachkennung',
            'name',
        ],
    ]) ?>

</div>
