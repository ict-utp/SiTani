<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Greetings
     */
    public function Greetings($hours)
    {
        if ($hours >= 0 && $hours <= 11)
            return "Pagi";
        else if ($hours >= 12 && $hours <= 14)
            return "Siang";
        else if ($hours >= 15 && $hours <= 17)
            return "Sore";
        else if ($hours >= 17 && $hours <= 18)
            return "Petang";
        else if ($hours >= 19 && $hours <= 23)
            return "Malam";
    }

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

        $data = ['users' => User::latest()->paginate(5),
                'greetings' => $this->Greetings(Carbon::now()->format('H'))];

        return view('dashboards.index', [
            'pageTitle' => 'Dashboard',
            'data' => collect($data),
            'breadcrumbItems' => $breadcrumbsItems,
        ]);
    }

}
