<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    /**
     * Dashboard
     */
    public function index()
    {
        $breadcrumbsItems = [
            [
                'name' => 'Dashboard',
                'url' => '#',
                'active' => true
            ],
        ];

        $data = ['users' => User::latest()->paginate(5)];

        return view('dashboards.index', [
            'pageTitle' => 'Dashboard',
            'data' => collect($data),
            'breadcrumbItems' => $breadcrumbsItems,
        ]);
    }

}
