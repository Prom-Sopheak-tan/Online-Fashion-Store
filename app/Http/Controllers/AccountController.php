<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function profile()
    {
        return view('account.profile');
    }

    public function orderHistory()
    {
        $orders = Auth::user() ? Auth::user()->orders()->latest()->get() : collect();
        return view('account.orders', compact('orders'));
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6', // កែត្រង់នេះ៖ ដូរពី 'new password' មកជា 'new_password'
        ]);

        $user = Auth::user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'ពាក្យសម្ងាត់បច្ចុប្បន្នមិនត្រឹមត្រូវ']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'ពាក្យសម្ងាត់ត្រូវបានផ្លាស់ប្តូរដោយជោគជ័យ!');
    }
}