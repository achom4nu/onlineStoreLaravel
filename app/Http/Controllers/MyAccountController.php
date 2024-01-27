<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;


class MyAccountController extends Controller
{
    public function orders()
    {
        $viewData = [];
        $idioma = App::currentLocale();

        if ($idioma == "en") {
            $viewData["title"] = "My Orders - Online Store";
            $viewData["subtitle"] =  "My Orders";
        } else {
            $viewData["title"] = "Mis Pedidos - Tienda en Línea";
            $viewData["subtitle"] =  "Mis Pedidos";
        }

        $viewData["orders"] = Order::with(['items.product'])->where('user_id', Auth::user()->getId())->get();
        return view('myaccount.orders')->with("viewData", $viewData);
    }
}
