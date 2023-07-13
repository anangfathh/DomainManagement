<?php

namespace App\Http\Controllers\Menu;


use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the menus.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('IsEmployee');
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
        $this->authorize('IsEmployee');
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|max:5000',
            'category' => 'required',
        ], [
            'required' => 'Semua atribut harus diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'image' => 'Data harus berupa gambar.',
            'image.max' => 'Gambar yang dikirim terlalu besar.',
        ]);

        // Store the menu
        $menu = new Menu();
        $menu->name = $validatedData['name'];
        $menu->price = $validatedData['price'];
        // Store the image and get the image path
        $imagePath = $request->file('image')->store('menu_images');
        $menu->image = $imagePath;
        $menu->category = $validatedData['category'];
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
        $this->authorize('IsEmployee');
        $menu = Menu::findOrFail($id);
        return view('employee.menu.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('IsEmployee');
        // Validate the input
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'image',
        ]);

        // Find the menu
        $menu = Menu::findOrFail($id);

        // Update the menu properties if the input is provided
        if ($request->filled('name')) {
            $menu->name = $request->name;
        }
        if ($request->filled('price')) {
            $menu->price = $request->price;
        }
        if ($request->filled('category')) {
            $menu->category = $request->category;
        }

        // Process the image if it's provided
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($menu->image) {
                Storage::delete($menu->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('menu_images');
            $menu->image = $imagePath;
        }

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
