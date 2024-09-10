<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Merchant;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merchant = Merchant::where('user_id', Auth::id())->first();
        $menus = Menu::where('merchant_id', $merchant->id)->get();
        return view('menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required',
            'stock' => 'required|numeric',
        ]);

        $merchant = Merchant::where('user_id', Auth::id())->first();

        $menu = new Menu();
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->description = $request->description;
        $menu->category = $request->category;
        $menu->stock = $request->stock;
        $menu->merchant_id = $merchant->id;

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('/images/menu/'), $imageName);
        $menu->image = $imageName;

        $menu->save();

        return redirect()->route('menus.index')->with('success', 'Menu Berhasil Dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'category' => 'required',
            'stock' => 'required|numeric',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->description = $request->description;
        $menu->category = $request->category;
        $menu->stock = $request->stock;

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            // Delete old image
            $image_path = public_path('/images/menu/' . $menu->image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            // Upload new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('/images/menu/'), $imageName);
            $menu->image = $imageName;
        }

        $menu->save();

        return redirect()->route('menus.index')->with('success', 'Menu Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        // Delete image
        $image_path = public_path('/images/menu/' . $menu->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu Berhasil Dihapus.');
    }
}
