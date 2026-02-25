<?php

use app\models\Benutzer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\Benutzersearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Benutzers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="benutzer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Benutzer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'benutzerkennung',
            'benutzername',
            'passwort_hash',
            'rolle',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Benutzer $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'benutzerkennung' => $model->benutzerkennung]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
