<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use LineLogger\Log;

class UsersController extends Controller
{
    public function list()
    {
        return User::all();
    }

    public function add()
    {
        $u = ["name" => "ku" . rand(1, 2), "email" => rand(1, 1000000) . "some-email@host.com", "password" => "1"];
        Log::get()->info("user");
        Log::get()->info($u);
        User::create($u);
        return $u;
    }

    public function group()
    {
//        https://stackoverflow.com/a/51891537/1024794
        return User::groupBy('name')->selectRaw('name, count(*) as total')
            ->get();
    }
}
