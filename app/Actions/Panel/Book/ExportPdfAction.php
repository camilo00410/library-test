<?php 
namespace App\Actions\Panel\Book;

use App\Models\Book;
use Illuminate\Http\Request;
use PDF;

final class ExportPdfAction
{
    public static function execute()
    {
        $books = Book::with('user:id,name')->get();
  
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'books' => $books
        ]; 
            
        $pdf = PDF::loadView('books.pdf', $data);
        return $pdf;

    }
}