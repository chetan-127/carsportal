<?php

namespace App\Http\Controllers;

use App\Models\Header;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug)
    {
        $url =  $slug;
        // echo $url;
        // die();   

        // Check if header exists
        $menu = Header::where('url', $url)->first();

        if (!$menu) {
            abort(404);
        }

        // If page content not created yet
        return view('frontend.coming-soon', [
            'title' => $menu->title
        ]);
    }
}
