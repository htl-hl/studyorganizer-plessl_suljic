<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Hausaufgabe $model */

$this->title = $model->hausaufgabenkennung;
$this->params['breadcrumbs'][] = ['label' => 'Hausaufgabes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="hausaufgabe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'hausaufgabenkennung' => $model->hausaufgabenkennung], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'hausaufgabenkennung' => $model->hausaufgabenkennung], [
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
            'hausaufgabenkennung',
            'titel',
            'beschreibung:ntext',
            'faelligkeitsdatum',
            'erledigt',
            'fachkennung',
            'benutzerkennung',
        ],
    ]) ?>

</div>
