<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Item;
use App\Http\Controllers\Controller;
use Charts;

class HomeController extends Controller
{
    public function dashboard()
    {
        $adminsCount = User::active()->where('user_type', 'admin')->count();
        $usersCount = User::active()->where('user_type', 'user')->count();
        $itemsCount = Item::count();

        return view('admin.dashboard.dashboard', compact(
                            'adminsCount', 
                            'usersCount',
                            'itemsCount'
                    ));
    }

    public function statistics()
    {
        $adminsChart = Charts::database(User::active()->where('user_type', 'admin')->get(), 'bar', 'highcharts')
                            ->elementLabel('المديرين')
                            ->title('مخطط المديرين')
                            ->dimensions(0, 200)
                            ->groupByMonth();

        $usersChart = Charts::database(User::active()->where('user_type', 'user')->get(), 'bar', 'highcharts')
                            ->elementLabel('العملاء')
                            ->title('مخطط العملاء')
                            ->dimensions(0, 200)
                            ->groupByMonth();

        $itemsChart = Charts::database(Item::get(), 'bar', 'highcharts')
                            ->elementLabel('الإعلانات')
                            ->title(' مخطط الإعلانات')
                            ->dimensions(0, 200)
                            ->groupByMonth();

        $adminsCount = User::active()->where('user_type', 'admin')->count();
        $usersCount = User::active()->where('user_type', 'user')->count();
        $itemsCount = Item::count();

        return view('admin.dashboard.statistics', compact(
                                'usersChart', 'usersCount',
                                'adminsChart', 'adminsCount',
                                'itemsChart', 'itemsCount'
                                
                            ));
    }
}
