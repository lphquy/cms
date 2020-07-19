<?php
namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{
    protected $_accessible = [
        'email'     => true,
        'password'  => true,
        'created'   => true,
        'modified'  => true,
        'articles'  => true,
    ];

    // protected $_hidden = [
    //     'password'  => true
    // ];

    protected function _setPassword(string $value): ?string
    {
        if(strlen($value) > 0) {
            return (new DefaultPasswordHasher())->hash($value);
        }
    }
}
