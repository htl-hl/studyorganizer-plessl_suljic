<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Benutzer $model */

$this->title = 'Update Benutzer: ' . $model->benutzerkennung;
$this->params['breadcrumbs'][] = ['label' => 'Benutzers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->benutzerkennung, 'url' => ['view', 'benutzerkennung' => $model->benutzerkennung]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="benutzer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
