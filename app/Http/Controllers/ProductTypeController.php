<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductTypeStoreRequest;
use App\Http\Requests\ProductTypeUpdateRequest;
use App\Models\ProductType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ProductTypeController extends Controller
{
    /**
     * Handle permission of this resource controller.
     */
    public function __construct()
    {
        $this->authorizeResource(ProductType::class, 'product_type');
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
                'name' => 'Product Types',
                'url' => '#',
                'active' => true
            ],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $productTypes = QueryBuilder::for(ProductType::class)
            ->allowedSorts(['name'])
            ->where('name', 'like', "%$q%")
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('product-types.index', [
            'productTypes' => $productTypes,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Product Types'
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
                'name' => 'Product Types',
                'url' => route('product-types.index'),
                'active' => false
            ],
            [
                'name' => 'Create Product Type',
                'url' => '#',
                'active' => true
            ],
        ];

        return view('product-types.create', [
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Create Product Type'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductTypeStoreRequest  $request
     * @return RedirectResponse
     *
     */
    public function store(ProductTypeStoreRequest $request)
    {
        $productType = ProductType::create($request->validated());

        return redirect()->route('product-types.index')->with('message', 'Product type created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  ProductType $productType
     * @return Application|Factory|View
     *
     */
    public function edit(Request $request, ProductType $productType)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Promotions',
                'url' => '#',
                'active' => false
            ],
            [
                'name' => 'Product Types',
                'url' => route('product-types.index'),
                'active' => false
            ],
            [
                'name' => 'Edit Product Type',
                'url' => '#',
                'active' => true
            ],
        ];

        return view('product-types.edit', [
            'productType' => $productType,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Edit Product Type'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductTypeUpdateRequest $request
     * @param  ProductType $productType
     * @return RedirectResponse
     *
     */
    public function update(ProductTypeUpdateRequest $request, ProductType $productType)
    {
        $productType->update($request->validated());

        return redirect()->route('product-types.index')->with('message', 'Product type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ProductType $productType
     * @return RedirectResponse
     *
     */
    public function destroy(ProductType $productType)
    {
        $productType->delete();
        return redirect()->route('product-types.index')->with('message', 'Product type deleted successfully');
    }
}
