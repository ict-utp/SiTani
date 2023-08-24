<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Owner;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\ProductType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{
    /**
     * Handle permission of this resource controller.
     */
    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     *
     */
    public function index(Request $request)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Promotions',
                'url' => '#',
                'active' => false
            ],
            [
                'name' => 'Products',
                'url' => '#',
                'active' => true
            ],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $products = QueryBuilder::for(Product::class)
            ->allowedSorts(['title', 'address'])
            ->where('title', 'like', "%$q%")
            ->orWhere('address', 'like', "%$q%")
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('products.index', [
            'products' => $products,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Product'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     *
     */
    public function create()
    {
        $breadcrumbsItems = [
            [
                'name' => 'Promotions',
                'url' => '#',
                'active' => false
            ],
            [
                'name' => 'Products',
                'url' => route('products.index'),
                'active' => false
            ],
            [
                'name' => 'Create Product',
                'url' => '#',
                'active' => true
            ],
        ];

        $productCategories = ProductCategories::all();
        $productTypes = ProductType::all();
        $owners = Owner::all();

        return view('products.create', [
            'productCategories' => $productCategories,
            'productTypes' => $productTypes,
            'owners' => $owners,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Create Product Type'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductStoreRequest  $request
     * @return RedirectResponse
     *
     */
    public function store(ProductStoreRequest $request)
    {
        $product = Product::create($request->validated());

        if($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $product->clearMediaCollection('product-image');
            $product->addMediaFromRequest('photo')->toMediaCollection('product-image');
        }

        return to_route('products.index')->with('message', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  Product $product
     * @return Application|Factory|View
     *
     */
    public function edit(Product $product)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Promotions',
                'url' => '#',
                'active' => false
            ],
            [
                'name' => 'Products',
                'url' => route('products.index'),
                'active' => false
            ],
            [
                'name' => 'Edit Product',
                'url' => '#',
                'active' => true
            ],
        ];

        $productCategories = ProductCategories::all();
        $productTypes = ProductType::all();
        $owners = Owner::all();

        return view('products.edit', [
            'productCategories' => $productCategories,
            'productTypes' => $productTypes,
            'owners' => $owners,
            'product' => $product,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Edit Product'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductUpdateRequest $request
     * @param  Product $product
     * @return RedirectResponse
     *
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {

        $product->update($request->safe(['title', 'quantity', 'period', 'address', 'description', 'product_categories_id', 'product_type_id', 'owner_id']));

        if($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $product->clearMediaCollection('product-image');
            $product->addMediaFromRequest('photo')->toMediaCollection('product-image');
        }

        return to_route('products.index')->with('message', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return RedirectResponse
     *
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return to_route('products.index')->with('message', 'Product deleted successfully');
    }
}
