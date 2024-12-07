<?php

namespace App\Http\Controllers\Front;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('front.menus.index', compact('menus'));
    }
}
