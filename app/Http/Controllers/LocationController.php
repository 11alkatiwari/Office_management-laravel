<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getStates($country)
    {
        $states = [
            'India' => ['Maharashtra', 'Delhi', 'Uttar Pradesh'],
            'USA' => ['California', 'Texas', 'New York'],
        ];

        return response()->json($states[$country] ?? []);
    }

    public function getCities($state)
    {
        $cities = [
            'Maharashtra' => ['Mumbai', 'Pune', 'Nagpur'],
            'Delhi' => ['New Delhi', 'South Delhi'],
            'Uttar Pradesh' => ['Lucknow', 'Kanpur'],
            'California' => ['Los Angeles', 'San Diego'],
            'Texas' => ['Houston', 'Dallas'],
            'New York' => ['New York City', 'Buffalo'],
        ];

        return response()->json($cities[$state] ?? []);
    }
}
{
    //
}
