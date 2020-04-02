<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showMainPage()
    {
        return $this->renderAdmin('main');
    }
    /**
     * @param $view
     * @param array $vars
     * @return Factory|View
     */
    protected function renderAdmin($view, $vars = [])
    {
        $menu = config("admin_menu");
        $clients = User::all()->count();

        return view($view)->with($vars)->withMenu($menu)->withClients($clients);
    }
}
