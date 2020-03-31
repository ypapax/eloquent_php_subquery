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

    public function sub()
    {
//        TO_CHAR(filings.updated_at, 'YYYY-MM-DD HH24:MI:SS.US') updated_at
//        $sub = User::limit(1);
//        $sub = User::selectRaw("name, updated_at")->limit(2);
        $sub = User::selectRaw("name, TO_CHAR(updated_at, 'YYYY-MM-DD HH24:MI:SS.US') upd")->limit(1);
//        $sub = User::selectRaw("name, TO_CHAR(updated_at, 'MM-DD HH24:MI:SS.US') updated_at")->limit(2);
        /*return User::groupBy('name')->selectRaw('name, count(*) as total')
            ->get();*/
        return $sub->get();
//        return "ku";
    }
}
