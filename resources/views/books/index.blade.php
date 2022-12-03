@extends('layouts.app')

@section('content')
<div id="wrapper" class="container">
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Libros</h1>
                    <p class="mb-4">Descubre los mejores libros en todos los idiomas .</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de libros </h6>
                        </div>
                        <div class="card-body">
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($books as $book)
                                            <tr>
                                                <td>{{$book->title}}</td>
                                                <td>{{$book->author_id}}</td>
                                                <td>{{$book->isbn}}</td>
                                                <td>{{$book->editorial}}</td>
                                                <td>{{$book->language}}</td>
                                                <td>{{$book->publication_year}}</td>
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
