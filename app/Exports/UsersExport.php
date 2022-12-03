<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    private $fileName = "books.xlsx";

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Book::all();
    }

    public function map($book): array
    {
        return [
            $book->title,
            $book->isbn,
            $book->publication_year,
            $book->author_id
        ];
    }
}
