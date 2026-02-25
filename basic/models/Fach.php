<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fach".
 *
 * @property int $fachkennung
 * @property string $name
 *
 * @property Hausaufgabe[] $hausaufgabes
 * @property LehrkraftFach[] $lehrkraftFaches
 * @property Lehrkraft[] $lehrkraftkennungs
 */
class Fach extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fach';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fachkennung' => 'Fachkennung',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Hausaufgabes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHausaufgabes()
    {
        return $this->hasMany(Hausaufgabe::class, ['fachkennung' => 'fachkennung']);
    }

    /**
     * Gets query for [[LehrkraftFaches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLehrkraftFaches()
    {
        return $this->hasMany(LehrkraftFach::class, ['fachkennung' => 'fachkennung']);
    }

    /**
     * Gets query for [[Lehrkraftkennungs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLehrkraftkennungs()
    {
        return $this->hasMany(Lehrkraft::class, ['lehrkraftkennung' => 'lehrkraftkennung'])->viaTable('lehrkraft_fach', ['fachkennung' => 'fachkennung']);
    }

}
