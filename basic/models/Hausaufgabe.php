<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hausaufgabe".
 *
 * @property int $hausaufgabenkennung
 * @property string $titel
 * @property string|null $beschreibung
 * @property string|null $faelligkeitsdatum
 * @property int $erledigt
 * @property int $fachkennung
 * @property int $benutzerkennung
 *
 * @property Benutzer $benutzerkennung0
 * @property Fach $fachkennung0
 */
class Hausaufgabe extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hausaufgabe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['beschreibung', 'faelligkeitsdatum'], 'default', 'value' => null],
            [['erledigt'], 'default', 'value' => 0],
            [['titel', 'fachkennung', 'benutzerkennung'], 'required'],
            [['beschreibung'], 'string'],
            [['faelligkeitsdatum'], 'safe'],
            [['erledigt', 'fachkennung', 'benutzerkennung'], 'integer'],
            [['titel'], 'string', 'max' => 255],
            [['fachkennung'], 'exist', 'skipOnError' => true, 'targetClass' => Fach::class, 'targetAttribute' => ['fachkennung' => 'fachkennung']],
            [['benutzerkennung'], 'exist', 'skipOnError' => true, 'targetClass' => Benutzer::class, 'targetAttribute' => ['benutzerkennung' => 'benutzerkennung']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'hausaufgabenkennung' => 'Hausaufgabenkennung',
            'titel' => 'Titel',
            'beschreibung' => 'Beschreibung',
            'faelligkeitsdatum' => 'Faelligkeitsdatum',
            'erledigt' => 'Erledigt',
            'fachkennung' => 'Fachkennung',
            'benutzerkennung' => 'Benutzerkennung',
        ];
    }

    /**
     * Gets query for [[Benutzerkennung0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBenutzerkennung0()
    {
        return $this->hasOne(Benutzer::class, ['benutzerkennung' => 'benutzerkennung']);
    }

    /**
     * Gets query for [[Fachkennung0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFachkennung0()
    {
        return $this->hasOne(Fach::class, ['fachkennung' => 'fachkennung']);
    }

}
