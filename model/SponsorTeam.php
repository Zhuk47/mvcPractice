<?php
/**
 * Created by PhpStorm.
 * User: zhuko
 * Date: 10.10.2017
 * Time: 9:03
 */

namespace App\Model;


class SponsorTeam extends ModelAbstract
{
    public $team_id;
    public $sponsor_id;
    public $id;

    public function __construct(int $team_id, int $sponsor_id, int $id = null)
    {
        $this->id = $id;
        $this->team_id = $team_id;
        $this->sponsor_id = $sponsor_id;
    }

    public function validate(): bool
    {
        if ($this->team_id = 0) {
            return false;
        }
        if ($this->sponsor_id = 0) {
            return false;
        }
        return true;
    }
}