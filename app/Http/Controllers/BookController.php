<?php

namespace App\Http\Controllers;

use App\Actions\Panel\Book\ExportPdfAction;
use App\Actions\Panel\Book\UpsertBookAction;
use App\Exports\BooksExport;
use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use App\ViewModels\Book\GetBookViewModel;
use App\ViewModels\Book\UpsertBookViewModel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use PDF;

class BookController extends Controller
{
    public function __construct(Excel $excel)
    {
        $this->middleware('auth');
        $this->excel = $excel;
    }
    
    public function index(GetBookViewModel $viewModel): Renderable
    {
        return view('books.index', $viewModel->getFormData());
    }

    public function create(): Renderable
    {
        $viewModel = new UpsertBookViewModel();
        return view('books.create', $viewModel->toArray()['form_data']);
    }

    public function store(BookStoreRequest $request)
    {
        $validated = $request->validated();

        if(!$validated){
            return back()->withErrors($validated->errors());
        }

        UpsertBookAction::execute($request);
        return redirect()->route('book.index')
                        ->with('success', __('Libro agregado correctamente.'));
    }

    public function edit(Book $book): Renderable
    {
        $viewModel = new UpsertBookViewModel($book);
        return view('books.edit', $viewModel->toArray()['form_data']);
    }

    public function update(Request $request, Book $book): RedirectResponse
    {
        UpsertBookAction::execute($request, $book);
        return redirect()->route('book.index')
                        ->with('success', __('Libro actualizado correctamente.'));
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect()->route('book.index')
                        ->with('success', 'Libro eliminado correctamente.');
    }

    public function exportExcel()
    {
        return $this->excel->download(new BooksExport, 'books.xlsx');
    }

    public function exportPDF()
    {
        $pdf = ExportPdfAction::execute();
        return $pdf->download('books.pdf');
    }
}
