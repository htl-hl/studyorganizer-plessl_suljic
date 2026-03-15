<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\RegisterForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Registrieren';
?>
<div class="site-register">
    <div class="auth-card">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php $form = ActiveForm::begin([
            'id' => 'register-form',
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
                'labelOptions' => ['class' => 'form-label'],
                'inputOptions' => ['class' => 'form-control'],
                'errorOptions' => ['class' => 'invalid-feedback'],
            ],
        ]); ?>

        <?= $form->field($model, 'benutzername')->textInput(['autofocus' => true, 'placeholder' => 'Gewünschten Benutzernamen wählen']) ?>

        <?= $form->field($model, 'passwort')->passwordInput(['placeholder' => 'Sicheres Passwort wählen']) ?>

        <div class="form-group mt-4">
            <?= Html::submitButton('Registrieren', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Bereits einen Account? Zum Login', ['site/login'], ['class' => 'btn btn-secondary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
