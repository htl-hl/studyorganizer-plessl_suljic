<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Hausaufgabe $model */

$this->title = 'Update Hausaufgabe: ' . $model->hausaufgabenkennung;
$this->params['breadcrumbs'][] = ['label' => 'Hausaufgabes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hausaufgabenkennung, 'url' => ['view', 'hausaufgabenkennung' => $model->hausaufgabenkennung]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hausaufgabe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
