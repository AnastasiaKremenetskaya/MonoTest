<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Factory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $menu = config("admin_menu");

        return view('main')->withMenu($menu);
    }
    /**
     * @param $view
     * @param array $vars
     * @return Factory|View
     */
    protected function renderAdmin($view, $vars = [])
    {
        $menu = config("admin_menu");
        return view($view)->with($menu);
    }
}
