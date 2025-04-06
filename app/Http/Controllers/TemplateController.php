<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Template;
use App\Models\UserTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::all();
        return view('dashboard.template', compact('templates'));
    }

    public function store(Request $request)
    {
        $request->validate(['template_id' => 'required|exists:templates,id']);

        UserTemplate::updateOrCreate(
            ['user_id' => Auth::id()],
            ['template_id' => $request->template_id]
        );

        return redirect()->route('dashboard')->with('success', 'Template selected successfully!');
    }
}
