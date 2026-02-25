<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "benutzer".
 *
 * @property int $benutzerkennung
 * @property string $benutzername
 * @property string $passwort_hash
 * @property string $rolle
 *
 * @property Hausaufgabe[] $hausaufgabes
 */
class Benutzer extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const ROLLE_ADMIN = 'admin';
    const ROLLE_LEHRER = 'lehrer';
    const ROLLE_SCHUELER = 'schueler';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'benutzer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['benutzername', 'passwort_hash', 'rolle'], 'required'],
            [['rolle'], 'string'],
            [['benutzername', 'passwort_hash'], 'string', 'max' => 255],
            ['rolle', 'in', 'range' => array_keys(self::optsRolle())],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'benutzerkennung' => 'Benutzerkennung',
            'benutzername' => 'Benutzername',
            'passwort_hash' => 'Passwort Hash',
            'rolle' => 'Rolle',
        ];
    }

    /**
     * Gets query for [[Hausaufgabes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHausaufgabes()
    {
        return $this->hasMany(Hausaufgabe::class, ['benutzerkennung' => 'benutzerkennung']);
    }


    /**
     * column rolle ENUM value labels
     * @return string[]
     */
    public static function optsRolle()
    {
        return [
            self::ROLLE_ADMIN => 'admin',
            self::ROLLE_LEHRER => 'lehrer',
            self::ROLLE_SCHUELER => 'schueler',
        ];
    }

    /**
     * @return string
     */
    public function displayRolle()
    {
        return self::optsRolle()[$this->rolle];
    }

    /**
     * @return bool
     */
    public function isRolleAdmin()
    {
        return $this->rolle === self::ROLLE_ADMIN;
    }

    public function setRolleToAdmin()
    {
        $this->rolle = self::ROLLE_ADMIN;
    }

    /**
     * @return bool
     */
    public function isRolleLehrer()
    {
        return $this->rolle === self::ROLLE_LEHRER;
    }

    public function setRolleToLehrer()
    {
        $this->rolle = self::ROLLE_LEHRER;
    }

    /**
     * @return bool
     */
    public function isRolleSchueler()
    {
        return $this->rolle === self::ROLLE_SCHUELER;
    }

    public function setRolleToSchueler()
    {
        $this->rolle = self::ROLLE_SCHUELER;
    }
}
