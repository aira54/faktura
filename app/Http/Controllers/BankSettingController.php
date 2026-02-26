<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BankSetting;

class BankSettingController extends Controller
{
    public function edit()
    {
        $business = Auth::user()->business;

        $bankSetting = $business->bankSetting;

        return view('settings.bank', compact('bankSetting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:255',
            'account_holder' => 'required|string|max:255',
        ]);

        $business = Auth::user()->business;

        $business->bankSetting()->updateOrCreate(
            ['business_id' => $business->id],
            [
                'bank_name' => $request->bank_name,
                'account_number' => $request->account_number,
                'account_holder' => $request->account_holder,
                'auto_send' => $request->has('auto_send')
            ]
        );

        return back()->with('success', 'Pengaturan bank berhasil disimpan.');
    }
}