<?php

use app\models\Fach;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\Fachsearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Faches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fach-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Fach', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fachkennung',
            'name',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Fach $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'fachkennung' => $model->fachkennung]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
