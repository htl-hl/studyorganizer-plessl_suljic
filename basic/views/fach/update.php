<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Fach $model */

$this->title = 'Update Fach: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Faches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'fachkennung' => $model->fachkennung]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fach-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
