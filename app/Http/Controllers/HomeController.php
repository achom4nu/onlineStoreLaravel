<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $idioma = App::currentLocale();

        if ($idioma == "en") {
            $viewData["title"] = "Home Page - Online Store";
        } else {
            $viewData["title"] = "Página principal - Tienda en Línea";
        }

        //$viewData["title"] = "Home Page - Online Store";
        return view('home.index')->with("viewData", $viewData);
    }

    public function about()
    {
        $viewData = [];
        $idioma = App::currentLocale();

        if ($idioma == "en") {
            $viewData["title"] = "About us - Online Store";
            $viewData["subtitle"] =  "About us";
            $viewData["description"] =  "This is an about page ...";
            $viewData["author"] = "Developed by: Manuel";
        } else {
            $viewData["title"] = "Sobre Nosotros - Tienda en Línea";
            $viewData["subtitle"] =  "Nosotros";
            $viewData["description"] =  "Esta es una página de información sobre nosotros";
            $viewData["author"] = "Desarrollado por: Manuel";
        }
        return view('home.about')->with("viewData", $viewData);
    }
}
