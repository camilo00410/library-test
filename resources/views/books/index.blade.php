@extends('layouts.app')


@section('content')
<div id="wrapper" class="container">

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <div class="container-fluid">

                    <h1 class="h3 mb-2 text-gray-800">Libros</h1>
                    <p class="mb-4">Descubre los mejores libros en todos los idiomas .</p>

                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{session('success')}}
                        </div>
                    @endif
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de libros </h6>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-primary mb-3 " href="{{ route('book.create') }}">Agregar Libro</a>
                            <a class="btn btn-success mb-3 " href="{{ route('export.excel') }}">Excel</a>
                            <a class="btn btn-danger mb-3 " href="{{ route('export.pdf') }}">PDF</a>

                            <div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Autor</th>
                                            <th>ISBN</th>
                                            <th>Editorial</th>
                                            <th>Idioma</th>
                                            <th>Año de publicación:</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($books as $book)
                                            <tr>
                                                <td>{{$book->title}}</td>
                                                <td>{{$book->user->name}}</td>
                                                <td>{{$book->isbn}}</td>
                                                <td>{{$book->editorial}}</td>
                                                <td>{{$book->language}}</td>
                                                <td>{{$book->publication_year}}</td>
                                                <td class="d-flex gap-3">
                                                    <a class="btn btn-primary mr-2 " href="{{ route('book.edit',$book->id) }}">Editar</a>
 
                                                    <form action="{{ route('book.destroy', $book->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <input type="submit" value="Eliminar" class="btn btn-danger ml-3" />
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination justify-content-end">
                                        {!! $books->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
