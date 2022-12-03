<?php
namespace App\ViewModels\Book;

use App\Models\Book;
use App\Models\User;
use App\ViewModels\ViewModel;

final class UpsertBookViewModel extends ViewModel
{
    protected $book;
    
    public function __construct(Book $book = null){
        $this->book = $book;
    }

    public function formData(): array
    {
        if($this->book){
            return $this->updateFormData();
        }
        return $this->createFormData();
    }

    protected function createFormData(): array
    {
        $book = new Book();
        $authors = User::select('id', 'name')->get();
        return compact('book', 'authors');
    }

    protected function updateFormData(): array
    {
        $book = $this->book;
        $book = $book->load('user');
        $authors = User::select('id', 'name')->get();
        return compact('book', 'authors');
    }
}