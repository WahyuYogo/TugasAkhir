<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserTemplate;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function show($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        $userTemplate = UserTemplate::where('user_id', $user->id)->first();
        $template = $userTemplate ? $userTemplate->template->slug : 'minimalist';
        return view("templates.$template", compact('user'));
    }
}
