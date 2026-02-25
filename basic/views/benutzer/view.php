<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Benutzer $model */

$this->title = $model->benutzerkennung;
$this->params['breadcrumbs'][] = ['label' => 'Benutzers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="benutzer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'benutzerkennung' => $model->benutzerkennung], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'benutzerkennung' => $model->benutzerkennung], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'benutzerkennung',
            'benutzername',
            'passwort_hash',
            'rolle',
        ],
    ]) ?>

</div>
