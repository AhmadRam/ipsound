<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    /**
     * Loads the home page for the storefront.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::where('status', 'ACTIVE')->get();

        $products = Product::where('status', 'ACTIVE')->get();

        $sliders = Slider::where('status', 'ACTIVE')->orderBy("sort_order")->get();

        return view('index', compact('categories', 'products', 'sliders'));
    }

    /**
     * Loads the home page for the storefront.
     *
     * @return \Illuminate\View\View
     */
    public function category($slug)
    {
        $category = Category::where('status', 'ACTIVE')->where('slug', $slug)->first();

        return view('category', compact('category'));
    }

    /**
     * Loads the home page for the storefront.
     *
     * @return \Illuminate\View\View
     */
    public function product($url_key)
    {
        $product = Product::where('status', 'ACTIVE')->where('url_key', $url_key)->first();

        return view('product', compact('product'));
    }
}
