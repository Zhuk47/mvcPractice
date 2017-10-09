<?php
namespace App\Model;

class Team extends ModelAbstract
{
    public $id;
    public $name;
    public $car;
    public $founded;

    public function __construct(string $name, string $car, string $founded, int $id = null)
    {
        $this->name = $name;
        $this->car = $car;
        $this->founded = $founded;
        $this->id = $id;
    }

    public function validate(): bool
    {
        if (iconv_strlen($this->name) > 50 || iconv_strlen($this->name) < 2) {
            return false;
        }
        if (iconv_strlen($this->car) > 50 || iconv_strlen($this->car) < 2) {
            return false;
        }
        if ($this->founded > 2100 || $this->founded < 1986) {
            return false;
        }
        return true;
    }
}
