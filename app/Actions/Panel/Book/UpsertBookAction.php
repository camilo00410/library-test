<?php 
namespace App\Actions\Panel\Book;

use App\Models\Book;
use Illuminate\Http\Request;

final class UpsertBookAction
{
    public static function execute(Request $request, $book = null)
    {
        Book::updateOrCreate(
            ['id' => $book ? $book->id : request()->route('book')],
            [
                'title' => $request->input('title'),
                'isbn' => $request->input('isbn'),
                'publication_year' => $request->input('publication_year'),
                'author_id' => $request->input('author')
            ]
        );
    }
}