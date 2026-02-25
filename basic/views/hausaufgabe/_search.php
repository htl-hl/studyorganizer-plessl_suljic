<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\HausaufgabeSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="hausaufgabe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'hausaufgabenkennung') ?>

    <?= $form->field($model, 'titel') ?>

    <?= $form->field($model, 'beschreibung') ?>

    <?= $form->field($model, 'faelligkeitsdatum') ?>

    <?= $form->field($model, 'erledigt') ?>

    <?php // echo $form->field($model, 'fachkennung') ?>

    <?php // echo $form->field($model, 'benutzerkennung') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
