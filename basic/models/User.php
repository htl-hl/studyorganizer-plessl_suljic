<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'benutzer';
    }

    // IdentityInterface Methoden
    public static function findIdentity($id)
    {
        return static::findOne(['benutzerkennung' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public static function findByUsername($username)
    {
        return static::findOne(['benutzername' => $username]);
    }

    public function getId()
    {
        return $this->benutzerkennung;
    }

    public function getAuthKey()
    {
        return null; // brauchst du nicht
    }

    public function validateAuthKey($authKey)
    {
        return false;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->passwort_hash);
    }
}