<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Hausaufgabe $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="hausaufgabe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'beschreibung')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'faelligkeitsdatum')->textInput() ?>

    <?= $form->field($model, 'erledigt')->textInput() ?>

    <?= $form->field($model, 'fachkennung')->textInput() ?>

    <?= $form->field($model, 'benutzerkennung')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
