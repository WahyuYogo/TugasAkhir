<?php

namespace App\Http\Controllers;

use App\Models\PortfolioView;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $projects = $user->projects;
        $socialLinks = $user->socialLinks;

        return view('dashboard.user', compact('user', 'projects', 'socialLinks'));
    }
}
