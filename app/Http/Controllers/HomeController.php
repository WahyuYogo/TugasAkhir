<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Template;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::all();
        $templates = Template::all();
        return view('home', compact('templates', 'user'));
    }
}
