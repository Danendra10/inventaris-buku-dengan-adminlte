<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use PDF;
use App\Models\books;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $books = books::get();
  
        $data = [
            'title' => 'Book List',
            'date' => date('m/d/Y'),
            'books' => $books
        ]; 
            
        $pdf = PDF::loadView('myPDF', $data);
     
        return $pdf->download('book-report.pdf');
    }
}