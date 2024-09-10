<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Merchant;
use App\Models\Menu;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Pemesanan;
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
    public function store(Request $request)
    {
        $transaction = Transaction::create([
            'customer_id' => Auth::user()->id,
            'menu_id' => $request->menu_id,
            'transaction_code' => 'TRX' . mt_rand(10000, 99999),
        ]);

        if ($transaction) {
            Menu::where('id', $request->menu_id)->decrement('stock', $request->quantity);
            Pemesanan::create([
                'transaction_id' => $transaction->id,
                'total_price' => $request->total_price,
                'tanggal_pengiriman' => $request->delivery_date,
                'waktu_pengiriman' => $request->delivery_time,
            ]);

            return redirect()->route('order.history')->with('success', 'Pesanan berhasil ditambahkan');
        }
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

    public function history()
    {
        $orders = Transaction::join('pemesanans', 'transactions.id', '=', 'pemesanans.transaction_id')
            ->where('customer_id', Auth::user()->id)
            ->get();

        return view('orders.index-customer', compact('orders'));
    }

    public function invoice($id)
    {
        $pemesanan = Pemesanan::where('id', $id)->first();
        // get transaction where id like pemesanan->transaction_id
        $order = Transaction::where('id', $pemesanan->transaction_id)->first();
        $quantity = 1;
        $customer = Customer::where('user_id', $order->customer_id)->first();
        $menu = Menu::where('id', $order->menu_id)->first();
        $merchant = Merchant::where('user_id', $menu->merchant_id)->first();

        return view('orders.invoice', compact('order', 'customer', 'merchant', 'menu', 'quantity', 'pemesanan'));
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
