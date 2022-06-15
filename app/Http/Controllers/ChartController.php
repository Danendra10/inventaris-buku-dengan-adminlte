<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;
use App\Charts\UserChart;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        $books = books::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');

        $chart = new UserChart;
        $chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $chart->dataset('New User Register Chart', 'line', $books)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);

        return view('books.chart', compact('chart'));
    }
}