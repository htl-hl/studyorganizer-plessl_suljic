<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lehrkraft".
 *
 * @property int $lehrkraftkennung
 * @property string $name
 * @property int $aktiv
 *
 * @property Fach[] $fachkennungs
 * @property LehrkraftFach[] $lehrkraftFaches
 */
class Lehrkraft extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lehrkraft';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['aktiv'], 'default', 'value' => 1],
            [['name'], 'required'],
            [['aktiv'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lehrkraftkennung' => 'Lehrkraftkennung',
            'name' => 'Name',
            'aktiv' => 'Aktiv',
        ];
    }

    /**
     * Gets query for [[Fachkennungs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFachkennungs()
    {
        return $this->hasMany(Fach::class, ['fachkennung' => 'fachkennung'])->viaTable('lehrkraft_fach', ['lehrkraftkennung' => 'lehrkraftkennung']);
    }

    /**
     * Gets query for [[LehrkraftFaches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLehrkraftFaches()
    {
        return $this->hasMany(LehrkraftFach::class, ['lehrkraftkennung' => 'lehrkraftkennung']);
    }

}
