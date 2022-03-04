<?php

namespace common\models;

use yii\base\Model;
use yii\web\IdentityInterface;

class User extends Model implements IdentityInterface
{
    public static function findIdentity($id)
    {
        return new self();
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return new self();
    }

    public function getId()
    {
        return 1;
    }

    public function getAuthKey()
    {
        return 'some-token';
    }

    public function validateAuthKey($authKey)
    {
        return true;
    }
}
