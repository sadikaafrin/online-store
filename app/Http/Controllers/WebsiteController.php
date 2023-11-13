<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
use function Termwind\ValueObjects\pr;

class WebsiteController extends Controller
{
    private $products, $product, $newarrival, $bestselling, $featured, $specialoffer;
    public function index()
    {
        $categories = Category::all();
//        $this->products = Product::where('trending_status', 0)->get(['id', 'name', 'selling_price', 'image']);
        //Here we can see most selling product
        $trending_status = DB::table('products')
            ->leftJoin('order_details','products.id','=','order_details.product_id')
            ->selectRaw('products.id, SUM(order_details.product_qty) as total')
            ->groupBy('products.id')
            ->orderBy('total','desc')

            ->get();
        $trendingProducts = [];
        foreach ($trending_status as $s)
        {
            $p = Product::findOrFail($s->id);
            $p->totalQty = $s->total;
            $trendingProducts[] = $p;
        }

//        $id  = DB::table('products')
//            ->leftJoin('order_details','products.id','=','order_details.product_id')
//            ->selectRaw('products.id, SUM(order_details.product_qty) as total')
//            ->groupBy('products.id')
//            ->orderBy('total','desc')
//
//            ->get();
//        $topCategories = [];
//        foreach ($id as $top)
//        {
//            $pro = Product::findOrFail($top->id);
//            $pro->totalQty = $top->total;
//            $topCategories[] = $pro;
//        }

//        $topSellingCategories = DB::table('products')
//            ->join('categories', 'products.category_id', '=', 'categories.id')
//            ->leftJoin('order_details', 'products.id', '=', 'order_details.product_id')
//            ->selectRaw('categories.id, categories.name, SUM(order_details.product_qty) as total')
//            ->groupBy('categories.id')
//            ->orderBy('total', 'desc')
//
//            ->get();

        $this->newarrival = Product::where('product_status', 1)->get(['id', 'name', 'selling_price', 'image']);
        $this->bestselling = Product::where('product_status', 2)->get(['id', 'name', 'selling_price', 'image']);
        $this->featured = Product::where('product_status', 3)->get(['id', 'name', 'selling_price', 'image']);
        $this->specialoffer = Product::where('product_status', 4)->get(['id', 'name', 'selling_price', 'image']);

//        $this->products = Product::orderBy('trending_status', 'desc')->get();

        return view('website.home.index',[
            'products'   =>  $this->products, 'categories' => $categories,
            'newarrival' => $this->newarrival,
            'bestselling' => $this->bestselling,
            'featured'   => $this->featured,
            'specialoffer'  => $this->specialoffer,
            'trendingProducts' => $trendingProducts,

        ]);
    }

    public function categoryProduct($id)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $this->products = Product::where('category_id', $id)->orderBy('id', 'desc')->get();
        return view('website.category.index', ['products' => $this->products, 'categories' => $categories, 'brands' => $brands]);
    }

    public function productDetail($id)
    {
        $products = Product::all();
        $categories = Category::all();
        $this->product = Product::find($id);
        return view('website.product.index', ['product' => $this->product, 'categories' => $categories, 'products' => $products]);
    }
}
