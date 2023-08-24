<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Owner;
use App\Models\ProductCategories;
use App\Models\ProductType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $productCategories = ProductCategories::all();
        $productTypes = ProductType::all();
        $products = Product::all();
        $owners = Owner::all();

        return view('frontend.index', [
            'productCategories' => $productCategories,
            'productTypes' => $productTypes,
            'products' => $products,
            'owners' => $owners,
            'pageTitle' => 'Home'
        ]);
    }
}
