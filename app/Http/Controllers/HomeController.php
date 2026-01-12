<?php

namespace App\Http\Controllers;

use App\Models\Header;
use App\Models\Banner;
use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        // foreach (Header::all() as $header) {
        //      echo $header->title . " - " . $header->type . "<br>";
        //      echo $header->subMenus->count() . " Sub-menus<br>";
        //      if ($header->type === 'sub-menu') {
        //         echo "Parent Menu: " . $header->parentMenu->title . "<br>";
        //      }
        //      if ($header->subMenus->count() > 0) {
        //          foreach ($header->subMenus as $submenu) {
        //              echo "-- " . $submenu->title . "<br>";
        //          }
        //      }
        //      if ($header->type === 'sub-menu') {
        //         echo "Parent Menu: " . $header->parentMenu->title . "<br>";
        //      }
        // }   
        // die();
        return view('home', [
            'headers' => Header::where('type', 'menu')
                ->whereNull('main_menu_id')
                ->with('children')
                ->orderBy('id')
                ->get(),
            'banners' => Banner::where('is_active', 1)->get(),
            'mostSearchedCars' => Car::where('listing_type', 'most-searched')->latest()->limit(8)->get(),
            'latestCars' => Car::where('listing_type', 'latest')->latest()->limit(8)->get(),
        ]);
    }
}
