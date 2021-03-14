<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\Contract\BaseRepository;

class UserRepository extends BaseRepository
{
    public $model = User::class;
    public $user;

    public function __construct()
    {
        $user = new User();
        $this->user = $user;
    }

    public function read($columns = '*', $where = array())
    {
        return $this->user->read($columns, $where);
    }
}