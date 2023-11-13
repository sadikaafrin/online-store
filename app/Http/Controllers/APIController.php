<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class APIController extends Controller
{
    private $categories, $products;

    public function index()
    {
        $this->categories = Category::all();

        foreach ($this->categories as $category)
        {
            $category->sub_categories = SubCategory::where('category_id', $category->id)->get();
        }

        return response()->json($this->categories);
    }

    public function getAllProduct()
    {
        $this->products = Product::where('status', 1)->get(['id', 'name', 'selling_price', 'image']);

        foreach ($this->products as $product)
        {
            $product->image = asset($product->image);
        }

        return response()->json($this->products);
    }
}
