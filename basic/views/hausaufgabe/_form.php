<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Hausaufgabe;

/** @var yii\web\View $this */
/** @var app\models\Hausaufgabe $model */
/** @var yii\widgets\ActiveForm $form */

$this->registerCss("
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=DM+Sans:wght@300;400;500&display=swap');

:root {
    --bg: #0f0f13;
    --surface: #1a1a24;
    --surface2: #22222f;
    --accent: #f0c060;
    --accent2: #e07040;
    --text: #f0ede8;
    --muted: #888899;
    --green: #4ade80;
    --red: #f87171;
    --radius: 16px;
}

body {
    background: var(--bg) !important;
    color: var(--text) !important;
    font-family: 'DM Sans', sans-serif !important;
}

.hausaufgabe-form {
    max-width: 660px;
    margin: 48px auto;
    background: var(--surface);
    border-radius: var(--radius);
    padding: 48px;
    border: 1px solid rgba(255,255,255,0.06);
    box-shadow: 0 20px 60px rgba(0,0,0,0.5);
    animation: fadeUp 0.4s ease both;
}

.form-header {
    margin-bottom: 36px;
    padding-bottom: 24px;
    border-bottom: 1px solid rgba(240,192,96,0.2);
}

.form-header h2 {
    font-family: 'Playfair Display', serif;
    font-size: 2rem;
    color: var(--accent);
    margin: 0 0 6px 0;
    letter-spacing: -0.5px;
}

.form-header p {
    color: var(--muted);
    font-size: 0.9rem;
    margin: 0;
    font-weight: 300;
}

.hausaufgabe-form .control-label {
    display: block;
    font-size: 0.75rem;
    font-weight: 500;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: 8px;
}

.hausaufgabe-form .form-control {
    width: 100%;
    padding: 12px 16px;
    border: 1.5px solid rgba(255,255,255,0.08);
    border-radius: 10px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.95rem;
    color: var(--text);
    background: var(--surface2);
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none;
    appearance: none;
    -webkit-appearance: none;
}

.hausaufgabe-form .form-control:focus {
    border-color: var(--accent);
    box-shadow: 0 0 0 3px rgba(240,192,96,0.12);
}

.hausaufgabe-form .form-control::placeholder {
    color: #55556a;
}

.hausaufgabe-form textarea.form-control {
    resize: vertical;
    min-height: 110px;
}

.select-wrapper {
    position: relative;
}

.select-wrapper select.form-control {
    padding-right: 42px;
    cursor: pointer;
}

.select-wrapper::after {
    content: '';
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 6px solid var(--accent);
    pointer-events: none;
}

.hausaufgabe-form select option {
    background: var(--surface2);
    color: var(--text);
}

.checkbox-field {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 16px;
    border: 1.5px solid rgba(255,255,255,0.08);
    border-radius: 10px;
    background: var(--surface2);
    cursor: pointer;
    transition: border-color 0.2s;
}

.checkbox-field:hover {
    border-color: rgba(240,192,96,0.3);
}

.checkbox-field input[type='checkbox'] {
    width: 18px;
    height: 18px;
    accent-color: var(--accent);
    cursor: pointer;
}

.checkbox-field span {
    font-size: 0.95rem;
    color: var(--text);
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
}

.field-section {
    margin-bottom: 22px;
}

.form-divider {
    border: none;
    border-top: 1px solid rgba(255,255,255,0.06);
    margin: 28px 0;
}

.btn-submit {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, var(--accent), var(--accent2));
    color: #0f0f13 !important;
    border: none;
    border-radius: 50px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.95rem;
    font-weight: 500;
    cursor: pointer;
    transition: transform 0.2s, box-shadow 0.2s;
    box-shadow: 0 4px 20px rgba(240,192,96,0.3);
    letter-spacing: 0.02em;
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(240,192,96,0.4);
}

.btn-submit:active {
    transform: scale(0.99);
}

.hausaufgabe-form .help-block {
    font-size: 0.8rem;
    color: var(--red);
    margin-top: 5px;
}

.hausaufgabe-form .has-error .form-control {
    border-color: var(--red);
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

@media (max-width: 520px) {
    .hausaufgabe-form { padding: 28px 20px; }
    .form-row { grid-template-columns: 1fr; }
}
");
?>

<div class="hausaufgabe-form">



    <?php $form = ActiveForm::begin([
            'fieldConfig' => [
                    'template' => "<div class='field-section'>{label}{input}{error}</div>",
                    'inputOptions' => ['class' => 'form-control'],
                    'errorOptions' => ['class' => 'help-block'],
            ]
    ]); ?>

    <?= $form->field($model, 'titel')->textInput([
            'maxlength' => true,
            'placeholder' => 'z. B. Seite 42 Aufgabe 3',
            'class' => 'form-control',
    ]) ?>

    <?= $form->field($model, 'beschreibung')->textarea([
            'rows' => 4,
            'placeholder' => 'Was genau ist zu tun?',
            'class' => 'form-control',
    ]) ?>

    <div class="form-row">
        <?= $form->field($model, 'faelligkeitsdatum')->textInput([
                'type' => 'date',
                'class' => 'form-control',
        ]) ?>

        <?= $form->field($model, 'fachkennung', [
                'template' => "<div class='field-section'>{label}<div class='select-wrapper'>{input}</div>{error}</div>"
        ])->dropDownList(
                Hausaufgabe::getFaecherList(),
                ['prompt' => '-- Fach wählen --', 'class' => 'form-control']
        ) ?>
    </div>

    <?= $form->field($model, 'erledigt', [
            'template' => "<div class='field-section'>{label}<label class='checkbox-field'>{input}<span>Bereits erledigt</span></label>{error}</div>"
    ])->checkbox(['label' => false]) ?>

    <?= $form->field($model, 'benutzerkennung')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>

    <hr class="form-divider">

    <div class="form-group">
        <?= Html::submitButton('Hausaufgabe speichern', ['class' => 'btn-submit']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>