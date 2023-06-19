<?php

namespace App\Http\Controllers\Menu;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the menus.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('employee.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new menu.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.menu.create');
    }

    /**
     * Store a newly created menu in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'category' => 'required',
        ]);

        // Store the menu
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->price = $request->price;
        // Store the image and get the image path
        $imagePath = $request->file('image')->store('menu_images');
        $menu->image = $imagePath;
        $menu->category = $request->category;
        $menu->save();

        return redirect()->route('menu.index')->with('success', 'Menu created successfully.');
    }

    /**
     * Show the form for editing the specified menu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    /**
     * Update the specified menu in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
        ]);

        // Find the menu
        $menu = Menu::findOrFail($id);
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->category = $request->category;
        $menu->save();

        return redirect()->route('menu.index')->with('success', 'Menu updated successfully.');
    }

    /**
     * Remove the specified menu from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu deleted successfully.');
    }

    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('employee.menu.show', compact('menu'));
    }
}
