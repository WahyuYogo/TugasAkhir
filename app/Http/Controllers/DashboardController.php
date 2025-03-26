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

        $today = PortfolioView::where('user_id', $user->id)
            ->whereDate('visited_at', Carbon::today())
            ->count();

        $week = PortfolioView::where('user_id', $user->id)
            ->whereBetween('visited_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count();

        $month = PortfolioView::where('user_id', $user->id)
            ->whereMonth('visited_at', Carbon::now()->month)
            ->count();

        return view('dashboard.user', compact('today', 'week', 'month'));
    }
}
