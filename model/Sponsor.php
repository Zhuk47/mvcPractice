<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 22.05.17
 * Time: 21:41
 */

namespace App\Model;

class Sponsor extends ModelAbstract
{
    public $id;
    public $name;

    public function __construct(string $name, int $id = null)
    {
        $this->name = $name;
        $this->id = $id;
    }

    public function validate(): bool
    {
        if (iconv_strlen($this->name) > 50 || iconv_strlen($this->name) < 2) {
            return false;
        }
        return true;
    }

}