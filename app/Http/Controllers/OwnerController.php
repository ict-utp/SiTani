<?php

namespace App\Http\Controllers;

use App\Http\Requests\OwnerStoreRequest;
use App\Http\Requests\OwnerUpdateRequest;
use App\Models\Owner;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class OwnerController extends Controller
{
    /**
     * Handle permission of this resource controller.
     */
    public function __construct()
    {
        $this->authorizeResource(Owner::class, 'owner');
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
                'name' => 'Owners',
                'url' => '#',
                'active' => true
            ],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $owners = QueryBuilder::for(Owner::class)
            ->allowedSorts(['name', 'phone', 'address'])
            ->where('name', 'like', "%$q%")
            ->orWhere('phone', 'like', "%$q%")
            ->orWhere('address', 'like', "%$q%")
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('owners.index', [
            'owners' => $owners,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Owners'
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
                'name' => 'Owners',
                'url' => route('owners.index'),
                'active' => false
            ],
            [
                'name' => 'Create Owner',
                'url' => '#',
                'active' => true
            ],
        ];

        return view('owners.create', [
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Create Owner'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OwnerStoreRequest  $request
     * @return RedirectResponse
     *
     */
    public function store(OwnerStoreRequest $request)
    {
        $owner = Owner::create($request->validated());

        return redirect()->route('owners.index')->with('message', 'Owner created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  Owner $owner
     * @return Application|Factory|View
     *
     */
    public function edit(Owner $owner)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Promotions',
                'url' => '#',
                'active' => false
            ],
            [
                'name' => 'Owners',
                'url' => route('owners.index'),
                'active' => false
            ],
            [
                'name' => 'Edit Owner',
                'url' => '#',
                'active' => true
            ],
        ];

        return view('owners.edit', [
            'owner' => $owner,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Edit Owner'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  OwnerUpdateRequest  $request
     * @param  Owner $owner
     * @return RedirectResponse
     *
     */
    public function update(OwnerUpdateRequest $request, Owner $owner)
    {
        $owner->update($request->validated());

        return redirect()->route('owners.index')->with('message', 'Owner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Owner $owner
     * @return RedirectResponse
     *
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();
        return to_route('owners.index')->with('message', 'Owner deleted successfully');
    }
}
