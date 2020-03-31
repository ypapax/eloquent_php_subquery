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
        return User::groupBy('name')->selectRaw('name, count(*) as total')
            ->get();
    }

    public function sub()
    {
        $sub = User::limit(1);
        return User::raw("({$sub->toSql()}) as sub")->mergeBindings($sub->getQuery())->selectRaw("name, TO_CHAR(updated_at, 'YYYY-MM-DD HH24:MI:SS.US') upd");
    }
}
