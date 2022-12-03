<?php 
namespace App\ViewModels\Book;

use App\Models\Book;
use App\ViewModels\ViewModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


final class GetBookViewModel extends ViewModel
{
    public static function books(): LengthAwarePaginator
    {
        return Book::
                    with('user:id,name')
                    ->latest()
                    ->paginate(10);
    }

    public function getFormData(): array
    {
        $books = self::books();
        return compact('books');
    }
}
