<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index()
    {
        $mainMenus = Header::where('type', 'menu')->get();
        $menus = Header::with('parentMenu')->get();

        return view('admin.header-manager', compact('mainMenus', 'menus'));
    }
    public function create()
    {
        $mainMenus = Header::where('type', 'menu')->get();
        return view('admin.add-header', compact('mainMenus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'label' => 'nullable',
            'url' => 'required',
            'type' => 'required|in:menu,sub-menu',
            'main_menu_id' => 'nullable|required_if:type,sub-menu|exists:headers,id',
        ]);

        Header::create([
            'title' => $request->title,
            'label' => $request->label,
            'url' => $request->url,
            'type' => $request->type,
            'main_menu_id' => $request->type === 'sub-menu'
                ? $request->main_menu_id
                : null,
        ]);

        return redirect()->back()->with('success', 'Menu created successfully');
    }

    public function edit(Header $menu)
    {
        $mainMenus = Header::where('type', 'menu')->where('id', '!=', $menu->id)->get();

        return view('admin.edit-header', compact('menu', 'mainMenus'));
    }

    public function update(Request $request, Header $menu)
    {
        $request->validate([
            'title' => 'required',
            'label' => 'nullable',
            'url' => 'required',
            'type' => 'required|in:menu,sub-menu',
            'main_menu_id' => 'nullable|required_if:type,sub-menu|exists:headers,id',
        ]);

        $menu = Header::findOrFail($menu->id);

        $menu->update([
            'title' => $request->title,
            'label' => $request->label,
            'url' => $request->url,
            'type' => $request->type,
            'main_menu_id' => $request->type === 'sub-menu'
                ? $request->main_menu_id
                : null,
        ]);

        return redirect()->route('header.index')->with('success', 'Menu updated successfully');
    }

    public function destroy(Header $menu)
    {
        $menu->delete();

        return redirect()->back()->with('success', 'Menu deleted successfully');
    }
}
