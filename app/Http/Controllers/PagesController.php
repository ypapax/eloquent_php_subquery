<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $tasks = [
            'Go to the store',
            'Go to the market',
            'Go to work',
        ];
        return view('welcome')
            ->withTasks($tasks)
            ->withFoo('bar')
            ->withName(request('name'));
    }

    public function contact()
    {
        return view('contact');
    }
}
