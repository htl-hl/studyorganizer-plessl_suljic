<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Hausaufgabe $model */

$this->title = $model->titel;

\yii\web\YiiAsset::register($this);

$this->registerCss(<<<CSS
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

.hausaufgabe-view {
    max-width: 660px;
    margin: 48px auto;
    animation: fadeUp 0.4s ease both;
}

.view-header {
    margin-bottom: 32px;
    padding-bottom: 24px;
    border-bottom: 1px solid rgba(240,192,96,0.2);
}

.view-header .back-link {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: var(--muted);
    text-decoration: none;
    font-size: 0.85rem;
    margin-bottom: 16px;
    transition: color 0.2s;
}

.view-header .back-link:hover {
    color: var(--accent);
}

.view-header h1 {
    font-family: 'Playfair Display', serif;
    font-size: 2rem;
    color: var(--accent);
    margin: 0 0 10px 0;
    letter-spacing: -0.5px;
}

.view-header .meta-row {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}

.ha-status {
    padding: 4px 14px;
    border-radius: 20px;
    font-size: 0.78rem;
    font-weight: 500;
}

.ha-status.erledigt {
    background: rgba(74,222,128,0.15);
    color: var(--green);
    border: 1px solid rgba(74,222,128,0.3);
}

.ha-status.offen {
    background: rgba(248,113,113,0.15);
    color: var(--red);
    border: 1px solid rgba(248,113,113,0.3);
}

.ha-fach {
    padding: 4px 14px;
    border-radius: 20px;
    font-size: 0.78rem;
    font-weight: 500;
    background: rgba(240,192,96,0.1);
    color: var(--accent);
    border: 1px solid rgba(240,192,96,0.2);
}

.detail-card {
    background: var(--surface);
    border-radius: var(--radius);
    border: 1px solid rgba(255,255,255,0.06);
    overflow: hidden;
    margin-bottom: 24px;
}

.detail-row {
    display: flex;
    padding: 16px 24px;
    border-bottom: 1px solid rgba(255,255,255,0.04);
    align-items: flex-start;
    gap: 16px;
}

.detail-row:last-child {
    border-bottom: none;
}

.detail-label {
    font-size: 0.75rem;
    font-weight: 500;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: var(--muted);
    min-width: 160px;
    padding-top: 2px;
}

.detail-value {
    font-size: 0.95rem;
    color: var(--text);
    line-height: 1.6;
    flex: 1;
}

.detail-value.beschreibung {
    color: #b0a89e;
    font-weight: 300;
}

.view-actions {
    display: flex;
    gap: 12px;
}

.btn-edit {
    flex: 1;
    text-align: center;
    padding: 13px;
    background: rgba(240,192,96,0.1);
    color: var(--accent) !important;
    border: 1px solid rgba(240,192,96,0.25);
    border-radius: 10px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.9rem;
    font-weight: 500;
    text-decoration: none !important;
    transition: background 0.2s, transform 0.15s;
}

.btn-edit:hover {
    background: rgba(240,192,96,0.2);
    transform: translateY(-1px);
}

.btn-delete {
    flex: 1;
    text-align: center;
    padding: 13px;
    background: rgba(248,113,113,0.1);
    color: var(--red) !important;
    border: 1px solid rgba(248,113,113,0.25);
    border-radius: 10px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.9rem;
    font-weight: 500;
    text-decoration: none !important;
    transition: background 0.2s, transform 0.15s;
    cursor: pointer;
}

.btn-delete:hover {
    background: rgba(248,113,113,0.2);
    transform: translateY(-1px);
}
.datum-blau  { color: blue; }
.datum-gelb  { color: goldenrod; }
.datum-rot   { color: red; }

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}
CSS);
?>

<div class="hausaufgabe-view">

    <div class="view-header">
        <?= Html::a('← Zurück zur Übersicht', ['index'], ['class' => 'back-link']) ?>
        <h1><?= Html::encode($model->titel) ?></h1>
        <div class="meta-row">
            <span class="ha-status <?= $model->erledigt ? 'erledigt' : 'offen' ?>">
                <?= $model->erledigt ? '✓ Erledigt' : '○ Offen' ?>
            </span>
            <?php if ($model->fachkennung): ?>
                <span class="ha-fach">📚 <?= Html::encode($model->fachkennung) ?></span>
            <?php endif; ?>
        </div>
    </div>

    <div class="detail-card">
        <?php if ($model->beschreibung): ?>
            <div class="detail-row">
                <div class="detail-label">Beschreibung</div>
                <div class="detail-value beschreibung"><?= nl2br(Html::encode($model->beschreibung)) ?></div>
            </div>
        <?php endif; ?>

        <div class="detail-row">
            <div class="detail-label">Fälligkeitsdatum</div>
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
        </div>

        <div class="detail-row">
            <div class="detail-label">Fach</div>
            <div class="detail-value"><?= Html::encode($model->fachkennung) ?: '<span style="color:var(--muted)">—</span>' ?></div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Benutzer</div>
            <div class="detail-value"><?= Html::encode($model->benutzerkennung0->benutzername) ?></div>
        </div>

        <div class="detail-row">
            <div class="detail-label">ID</div>
            <div class="detail-value" style="color:var(--muted); font-size:0.85rem"><?= $model->hausaufgabenkennung ?></div>
        </div>
    </div>

    <div class="view-actions">
        <?= Html::a('✏️ Bearbeiten', ['update', 'hausaufgabenkennung' => $model->hausaufgabenkennung], ['class' => 'btn-edit']) ?>
        <?= Html::a('🗑️ Löschen', ['delete', 'hausaufgabenkennung' => $model->hausaufgabenkennung], [
                'class' => 'btn-delete',
                'data' => [
                        'confirm' => 'Hausaufgabe wirklich löschen?',
                        'method' => 'post',
                ],
        ]) ?>
    </div>

</div>