<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Merchant;
use App\Models\Menu;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('order', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // check if request address or category is not empty
        if ($request->address && $request->category) {
            $merchant = Merchant::where('address', 'LIKE', '%' . $request->address . '%')
                ->first();
            $menus = Menu::where('merchant_id', $merchant->id)
                ->where('category', $request->category)
                ->get();
        } elseif ($request->address) {
            $merchant = Merchant::where('address', 'LIKE', '%' . $request->address . '%')
                ->first();
            $menus = Menu::where('merchant_id', $merchant->id)
                ->get();
        } elseif ($request->category) {
            $menus = Menu::where('category', $request->category)->get();
        } else {
            $menus = Menu::all();
        }

        return view('order', compact('menus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
