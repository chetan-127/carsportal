<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('display_order', 'asc')->get();

        return view('admin.banner-manager', compact('banners'));
    }
    public function create()
    {
        return view('admin.create-banner');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'link'          => 'nullable|url',
            'image'         => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'alt_text'      => 'nullable|string|max:255',
            'position'      => 'nullable|string|max:100',
            'display_order' => 'nullable|integer|min:0',
            'is_active'     => 'required|boolean',
        ]);

        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('banner'), $filename);
        $imagePath = 'banner/' . $filename;

        Banner::create([
            'title'         => $request->title,
            'link'          => $request->link,
            'image'         => $imagePath,
            'alt_text'      => $request->alt_text,
            'position'      => $request->position,
            'display_order' => $request->display_order ?? 0,
            'is_active'     => $request->is_active,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Banner saved successfully.');
    }

    public function edit(Banner $banner)
    {
        return view('admin.edit-banner', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'link'          => 'nullable|url',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'alt_text'      => 'nullable|string|max:255',
            'position'      => 'nullable|string|max:100',
            'display_order' => 'nullable|integer|min:0',
            'is_active'     => 'required|boolean',
        ]);

        unset($validated['image']);
        if ($request->hasFile('image')) {

            if ($banner->image && File::exists(public_path($banner->image))) {
                File::delete(public_path($banner->image));
            }

            $image = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('banner'), $filename);

            $validated['image'] = 'banner/' . $filename;
        }
        $banner->update($validated);

        return redirect()
            ->back()
            ->with('success', 'Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image && Storage::disk('public')->exists($banner->image)) {
            Storage::disk('public')->delete($banner->image);
        }

        $banner->delete();

        return redirect()
            ->back()
            ->with('success', 'Banner deleted successfully.');
    }
}
