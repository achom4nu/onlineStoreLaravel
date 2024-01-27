<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;



class AdminProductCategoryController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Categories - Online Store";
        $viewData["categories"] = ProductCategory::all();
        return view('admin.category.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        ProductCategory::validate($request);

        $newCategory = new ProductCategory();
        $newCategory->setName($request->input('name'));
        $newCategory->save();

        return back();
    }

    public function delete($id)
    {
        ProductCategory::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit Category - Online Store";
        $viewData["categories"] = ProductCategory::findOrFail($id);
        return view('admin.category.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        ProductCategory::validate($request);

        $category = ProductCategory::findOrFail($id);
        $category->setName($request->input('name'));
        $category->save();
        return redirect()->route('admin.category.index');
    }

    
}
