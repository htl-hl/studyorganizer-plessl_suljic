<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Benutzer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="benutzer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'benutzername')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passwort_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rolle')->dropDownList([ 'admin' => 'Admin', 'lehrer' => 'Lehrer', 'schueler' => 'Schueler', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
