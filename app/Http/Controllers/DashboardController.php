<?php

namespace App\Http\Controllers;

use Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
    }

    public function dashboardModern()
    {
        return view('/pages/dashboard-modern');
    }

    public function dashboardEcommerce()
    {
        // navbar large
        $pageConfigs = ['navbarLarge' => false];

        return view('/pages/dashboard-ecommerce', ['pageConfigs' => $pageConfigs]);
    }

    public function dashboardAnalytics()
    {
        // navbar large
        $pageConfigs = ['navbarLarge' => false];

        return view('/pages/dashboard-analytics', ['pageConfigs' => $pageConfigs]);
    }
}
