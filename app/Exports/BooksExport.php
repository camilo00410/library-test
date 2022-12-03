<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BooksExport implements FromCollection, Responsable, WithMapping, WithHeadings
{
    use Exportable;

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
            $book->user->name
        ];
    }

    public function headings(): array
    {
        return [
            'Titulo',
            'ISBN',
            'Años de publicación',
            'Autor'
        ];
    }
}
