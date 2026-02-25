<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Benutzersearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="benutzer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'benutzerkennung') ?>

    <?= $form->field($model, 'benutzername') ?>

    <?= $form->field($model, 'passwort_hash') ?>

    <?= $form->field($model, 'rolle') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
