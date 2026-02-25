<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lehrkraft_fach".
 *
 * @property int $lehrkraftkennung
 * @property int $fachkennung
 *
 * @property Fach $fachkennung0
 * @property Lehrkraft $lehrkraftkennung0
 */
class LehrkraftFach extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lehrkraft_fach';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lehrkraftkennung', 'fachkennung'], 'required'],
            [['lehrkraftkennung', 'fachkennung'], 'integer'],
            [['lehrkraftkennung', 'fachkennung'], 'unique', 'targetAttribute' => ['lehrkraftkennung', 'fachkennung']],
            [['lehrkraftkennung'], 'exist', 'skipOnError' => true, 'targetClass' => Lehrkraft::class, 'targetAttribute' => ['lehrkraftkennung' => 'lehrkraftkennung']],
            [['fachkennung'], 'exist', 'skipOnError' => true, 'targetClass' => Fach::class, 'targetAttribute' => ['fachkennung' => 'fachkennung']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lehrkraftkennung' => 'Lehrkraftkennung',
            'fachkennung' => 'Fachkennung',
        ];
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

    /**
     * Gets query for [[Lehrkraftkennung0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLehrkraftkennung0()
    {
        return $this->hasOne(Lehrkraft::class, ['lehrkraftkennung' => 'lehrkraftkennung']);
    }

}
