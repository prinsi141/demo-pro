<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\Role;
use App\Models\RoleUser;


class BaseController extends Controller
{
    public function __construct()
    {
        $this->City = new City;
        $this->User = new User;
        $this->State = new State;
        $this->Role = new Role;
        $this->RoleUser = new RoleUser;

    }
}
