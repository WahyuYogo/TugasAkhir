<?php

namespace App\Http\Controllers;

use App\Models\PortfolioView;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($slug, Request $request)
    {
        $user = User::where('slug', $slug)->firstOrFail();

        $visitor_ip = $request->ip();
        $today = Carbon::today();

        $existingView = PortfolioView::where('user_id', $user->id)
            ->where('visitor_ip', $visitor_ip)
            ->whereDate('visited_at', $today)
            ->first();

        if (!$existingView) {
            PortfolioView::create([
                'user_id' => $user->id,
                'visitor_ip' => $visitor_ip,
                'visited_at' => now(),
            ]);
        }

        return view('portfolio.show', compact('user'));
    }
}
