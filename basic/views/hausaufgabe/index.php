<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hausaufgaben';
?>

<div class="page-header">
    <h1>Hausaufgaben</h1>
    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->rolle !== 'schueler'): ?>
        <?= Html::a('+ Neue Aufgabe', ['create'], ['class' => 'btn-neu']) ?>
    <?php endif; ?>
</div>

<div class="cards-grid">
    <?php if (empty($models)): ?>
        <div class="empty">Noch keine Hausaufgaben vorhanden.</div>
    <?php else: ?>
        <?php foreach ($models as $model): ?>
            <div class="ha-card">
                <div class="ha-titel"><?= Html::encode($model->titel) ?></div>

                <?php if ($model->beschreibung): ?>
                    <div class="ha-beschreibung"><?= Html::encode($model->beschreibung) ?></div>
                <?php endif; ?>

                <?php if ($model->faelligkeitsdatum): ?>
                    <?php
                    $faellig = strtotime($model->faelligkeitsdatum);
                    $now = time();
                    $diff = $faellig - $now;

                    $colorClass = '';
                    if ($diff < 86400) {           // < 1 Tag
                        $colorClass = 'datum-rot';
                    } elseif ($diff < 604800) {    // < 1 Woche
                        $colorClass = 'datum-gelb';
                    } elseif ($diff < 1209600) {   // < 2 Wochen
                        $colorClass = 'datum-blau';
                    }
                    ?>

                    <div class="ha-datum <?= $colorClass ?>">
                        <?= date('d.m.Y', $faellig) ?>
                    </div>
                <?php endif; ?>

                <div>
            <span class="ha-status <?= $model->erledigt ? 'erledigt' : 'offen' ?>">
                <?= $model->erledigt ? '✓ erledigt' : '○ offen' ?>
            </span>
                </div>

                <div class="ha-actions">
                    <?= Html::a('Ansehen', ['view', 'hausaufgabenkennung' => $model->hausaufgabenkennung]) ?>
                    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->rolle !== 'schueler'): ?>
                        <?= Html::a('Bearbeiten', ['update', 'hausaufgabenkennung' => $model->hausaufgabenkennung]) ?>
                        <?= Html::a('Löschen', ['delete', 'hausaufgabenkennung' => $model->hausaufgabenkennung], [
                                'class' => 'delete',
                                'data' => ['confirm' => 'Wirklich löschen?', 'method' => 'post'],
                        ]) ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
