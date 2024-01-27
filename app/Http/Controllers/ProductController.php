<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Comment;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class ProductController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["categorias"] = ProductCategory::all();
        $idioma = App::currentLocale();

        if ($idioma == "en") {
            $viewData["title"] = "Products - Online Store";
            $viewData["subtitle"] =  "List of products";
        } else {
            $viewData["title"] = "Productos - Tienda en Línea";
            $viewData["subtitle"] =  "Lista de productos";
        }
        
        $viewData["products"] = Product::all();
        return view('product.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $idioma = App::currentLocale();
        $product = Product::findOrFail($id);

        if ($idioma == "en") {
            $viewData["title"] = $product->getName()." - Online Store";
            $viewData["subtitle"] =  $product->getName()." - Product information";
        } else {
            $viewData["title"] = $product->getName()." - Tienda en Línea";
            $viewData["subtitle"] =  $product->getName()." - Información de producto";
        }

        
        $comment = Comment::all();
        $viewData["product"] = $product;
        $viewData["comments"] = $comment;
        
        return view('product.show')->with("viewData", $viewData);
    }

    public function showProductByCategory($category_id){

        $viewData = [];
        $viewData["products"] = Product::where('category_id',$category_id)->get();
        $viewData["categorias"] = ProductCategory::all();
        $categoria = ProductCategory::where('id', $category_id)->first();

        $idioma = App::currentLocale();

        if ($idioma == "en") {
            $viewData["title"] = $categoria->getName()." - Online Store";
            $viewData["subtitle"] =  $categoria->getName();
        } else {
            $viewData["title"] = $categoria->getName()." - Tienda en Línea";
            $viewData["subtitle"] =  $categoria->getName();
        }

        return view('product.index')->with("viewData", $viewData);

    }
}
