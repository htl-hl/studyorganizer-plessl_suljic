<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hausaufgaben';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    body {
        background: #1e1e2e !important;
        color: #cdd6f4 !important;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .page-header h1 {
        color: #cdd6f4;
        font-size: 1.8rem;
        margin: 0;
    }

    .btn-neu {
        background: #89b4fa;
        color: #1e1e2e !important;
        padding: 8px 20px;
        border-radius: 6px;
        text-decoration: none !important;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .btn-neu:hover {
        background: #74c7ec;
    }

    .cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 16px;
    }

    .ha-card {
        background: #313244;
        border-radius: 8px;
        padding: 20px;
        border: 1px solid #45475a;
    }

    .ha-card:hover {
        border-color: #89b4fa;
    }

    .ha-titel {
        font-size: 1.1rem;
        font-weight: 600;
        color: #cdd6f4;
        margin: 0 0 8px 0;
    }

    .ha-beschreibung {
        color: #a6adc8;
        font-size: 0.85rem;
        margin-bottom: 12px;
        line-height: 1.5;
    }

    .ha-datum {
        color: #a6adc8;
        font-size: 0.8rem;
        margin-bottom: 12px;
    }

    .ha-status {
        display: inline-block;
        padding: 2px 10px;
        border-radius: 4px;
        font-size: 0.75rem;
        margin-bottom: 14px;
    }

    .ha-status.erledigt {
        background: rgba(166,227,161,0.15);
        color: #a6e3a1;
    }

    .ha-status.offen {
        background: rgba(243,139,168,0.15);
        color: #f38ba8;
    }

    .ha-actions {
        display: flex;
        gap: 8px;
        border-top: 1px solid #45475a;
        padding-top: 12px;
        margin-top: 4px;
    }

    .ha-actions a {
        font-size: 0.8rem;
        text-decoration: none !important;
        color: #a6adc8 !important;
        padding: 4px 10px;
        border-radius: 4px;
        background: #1e1e2e;
    }

    .ha-actions a:hover {
        color: #cdd6f4 !important;
    }

    .ha-actions a.delete {
        color: #f38ba8 !important;
        margin-left: auto;
    }

    .empty {
        color: #a6adc8;
        text-align: center;
        padding: 60px;
    }
</style>

<div class="page-header">
    <h1>Hausaufgaben</h1>
    <?= Html::a('+ Neue Aufgabe', ['create'], ['class' => 'btn-neu']) ?>
</div>

<div class="cards-grid">
    <?php $models = $dataProvider->getModels(); ?>
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
                    <div class="ha-datum">📅 <?= date('d.m.Y', strtotime($model->faelligkeitsdatum)) ?></div>
                <?php endif; ?>

                <div>
            <span class="ha-status <?= $model->erledigt ? 'erledigt' : 'offen' ?>">
                <?= $model->erledigt ? '✓ erledigt' : '○ offen' ?>
            </span>
                </div>

                <div class="ha-actions">
                    <?= Html::a('Ansehen', ['view', 'id' => $model->hausaufgabenkennung]) ?>
                    <?= Html::a('Bearbeiten', ['update', 'id' => $model->hausaufgabenkennung]) ?>
                    <?= Html::a('Löschen', ['delete', 'id' => $model->hausaufgabenkennung], [
                            'class' => 'delete',
                            'data' => ['confirm' => 'Wirklich löschen?', 'method' => 'post'],
                    ]) ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>