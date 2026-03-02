<?php
namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $benutzername;
    public $passwort;
    public $rolle = 'schueler';

    public function rules()
    {
        return [
            [['benutzername', 'passwort'], 'required'],
            [['benutzername', 'passwort'], 'string', 'max' => 255],
            ['rolle', 'in', 'range' => ['admin', 'lehrer', 'schueler']],
        ];
    }

    public function register()
    {
        if (!$this->validate()) return false;

        $user = new User();
        $user->benutzername = $this->benutzername;
        $user->passwort_hash = Yii::$app->security->generatePasswordHash($this->passwort);
        $user->rolle = $this->rolle;

        return $user->save();
    }
}