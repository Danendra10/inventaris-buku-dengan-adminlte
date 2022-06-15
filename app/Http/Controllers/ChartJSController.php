<?php
  
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Models\books;
use Illuminate\Support\Facades\DB;
    
class ChartJSController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $books = books::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count', 'month_name');
 
        $labels = $books->keys();
        $data = $books->values();
              
        return view('chart', compact('labels', 'data'));
    }
}