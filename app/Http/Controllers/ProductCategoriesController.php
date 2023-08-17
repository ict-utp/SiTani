<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryStoreRequest;
use App\Http\Requests\ProductCategoryUpdateRequest;
use App\Models\ProductCategories;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ProductCategoriesController extends Controller
{
    /**
     * Handle permission of this resource controller.
     */
    public function __construct()
    {
        $this->authorizeResource(ProductCategories::class, 'product_category');
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
                'name' => 'Product Categories',
                'url' => '#',
                'active' => true
            ],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $productCategories = QueryBuilder::for(ProductCategories::class)
            ->allowedSorts(['name'])
            ->where('name', 'like', "%$q%")
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('product-categories.index', [
            'productCategories' => $productCategories,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Product Categories'
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
                'name' => 'Product Categories',
                'url' => route('product-categories.index'),
                'active' => false
            ],
            [
                'name' => 'Create Product Categories',
                'url' => '#',
                'active' => true
            ],
        ];

        return view('product-categories.create', [
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Create Product Categories'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductCategoryStoreRequest  $request
     * @return RedirectResponse
     *
     */
    public function store(ProductCategoryStoreRequest $request)
    {
        $productCategory = ProductCategories::create($request->validated());

        return redirect()->route('product-categories.index')->with('message', 'Product categories created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  ProductCategories $productCategory
     * @return Application|Factory|View
     *
     */
    public function edit(ProductCategories $productCategory)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Promotions',
                'url' => '#',
                'active' => false
            ],
            [
                'name' => 'Product Categories',
                'url' => route('product-categories.index'),
                'active' => false
            ],
            [
                'name' => 'Edit Product Categories',
                'url' => '#',
                'active' => true
            ],
        ];

        return view('product-categories.edit', [
            'productCategory' => $productCategory,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Edit Product Categories'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductCategoryUpdateRequest $request
     * @param  ProductCategories $productCategory
     * @return RedirectResponse
     *
     */
    public function update(ProductCategoryUpdateRequest $request, ProductCategories $productCategory)
    {
        $productCategory->update($request->validated());

        return redirect()->route('product-categories.index')->with('message', 'Product categories updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ProductCategories $productCategory
     * @return RedirectResponse
     *
     */
    public function destroy(ProductCategories $productCategory)
    {
        $productCategory->delete();

        return redirect()->route('product-categories.index')->with('message', 'Product categories deleted successfully');
    }
}
