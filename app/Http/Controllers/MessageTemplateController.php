<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MessageTemplate;

class MessageTemplateController extends Controller
{
    public function edit()
    {
        $business = Auth::user()->business;

        $template = $business->messageTemplate;

        return view('settings.template', compact('template'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'template' => 'required|string'
        ]);

        $business = Auth::user()->business;

        $business->messageTemplate()->updateOrCreate(
            ['business_id' => $business->id],
            ['template' => $request->template]
        );

        return back()->with('success', 'Template berhasil disimpan.');
    }
}