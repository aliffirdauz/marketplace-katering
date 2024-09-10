<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateMerchantRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;
use App\Models\Transaction;


class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merchant = Merchant::where('user_id', Auth::id())->first();
        return view('dashboard', compact('merchant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register-merchant');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name_merchant' => ['required', 'string', 'max:255'],
            'address_merchant' => ['required', 'string', 'max:255'],
            'phone_merchant' => ['required', 'numeric', 'digits_between:10,15'],
            'description_merchant' => ['required', 'string', 'max:255'],
            'logo_merchant' => ['required', 'image', 'max:1024'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
            'role' => ['required']
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        $logo = $request->file('logo_merchant');
        $logo->storeAs('public/logos', $user->id . '.' . $logo->extension());

        $user->merchant()->create([
            'name' => $request->name_merchant,
            'address' => $request->address_merchant,
            'phone' => $request->phone_merchant,
            'description' => $request->description_merchant,
            'logo' => $user->id . '.' . $logo->extension(),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    public function order()
    {
        $merchant = Auth::user()->merchant;
        // get transaction join pemesanans where merchant_id like merchant->id
        $orders = Transaction::where('menu_id', $merchant->id)
            ->join('pemesanans', 'transactions.id', '=', 'pemesanans.transaction_id')
            ->get();

        return view('orders.index-merchant', compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Merchant $merchant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merchant $merchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMerchantRequest $request, Merchant $merchant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchant $merchant)
    {
        //
    }
}
