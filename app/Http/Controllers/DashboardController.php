<?php

namespace App\Http\Controllers;

use App\Models\PortfolioView;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;
        $socialLinks = auth()->user()->socialLinks;
        return view('dashboard.user', compact('projects', 'socialLinks'));
    }
}
