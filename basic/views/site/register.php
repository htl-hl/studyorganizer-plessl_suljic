<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Registrieren';
?>
<div class="site-register">
    <h1>Registrieren</h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'benutzername')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'passwort')->passwordInput() ?>

            <?= $form->field($model, 'rolle')->dropDownList([
                'schueler' => 'Schüler',
                'lehrer' => 'Lehrer',
                'admin' => 'Admin',
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Registrieren', ['class' => 'btn btn-success']) ?>
                <?= Html::a('Zurück zum Login', ['site/login'], ['class' => 'btn btn-secondary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>