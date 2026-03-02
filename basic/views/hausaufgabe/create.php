<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Hausaufgabe $model */

$this->title = 'Create Hausaufgabe';

?>
<div class="hausaufgabe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
