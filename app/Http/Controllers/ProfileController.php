<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Merchant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit()
    {
        $user = Auth::user();
        $merchant = Merchant::where('user_id', Auth::id())->first();
        return view('profile.edit', compact('user', 'merchant'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name_merchant' => ['required', 'string', 'max:255'],
            'address_merchant' => ['required', 'string', 'max:255'],
            'phone_merchant' => ['required', 'numeric', 'digits_between:10,15'],
            'description_merchant' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        if ($request->hasFile('logo_merchant')) {
            // delete the old logo
            $oldLogo = Merchant::where('user_id', Auth::id())->first()->logo;
            if ($oldLogo) {
                unlink(storage_path('app/public/logos/' . $oldLogo));
            }
            $logo = $request->file('logo_merchant');
            $logo->storeAs('public/logos', Auth::id() . '.' . $logo->extension());
            $logo = Auth::id() . '.' . $logo->extension();
        } else {
            $logo = Merchant::where('user_id', Auth::id())->first()->logo;
        }

        $user = $request->user();
        $merchant = Merchant::where('user_id', Auth::id())->first();

        $user->update($request->only('email'));

        $merchant->update([
            'name' => $request->name_merchant,
            'address' => $request->address_merchant,
            'phone' => $request->phone_merchant,
            'description' => $request->description_merchant,
            'logo' => $logo,
        ]);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
}
