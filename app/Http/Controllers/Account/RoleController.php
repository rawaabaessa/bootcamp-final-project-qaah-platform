<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    //

    public function index()
    {
        return view('back.account.roles.index');
    }
}
