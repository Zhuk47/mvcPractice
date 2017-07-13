<?php

/**
 * Created by PhpStorm.
 * User: artem
 * Date: 21.05.17
 * Time: 13:02
 */
namespace App\Model;

abstract class ModelAbstract
{
    public abstract function validate(): bool;
}
