@extends('layouts.app')


@section('js')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

<script>
    $("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years",
    autoclose:true
});
</script>
@endsection

@section('css')
<style>
    .is-error{
        border: 1px solid red !important;
        margin-bottom: -10px !important;
    }

    .alert-validation{
        font-size: 12px;
        font-family: Poppins-Regular, sans-serif;
        color:red; 
        margin-bottom:12px;
        align-items: center;
        width: 100%;
    }
</style>
    
@endsection
@section('content')
<div id="wrapper" class="container-sm">
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Libro</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                        <form action="{{ route('book.update', $book->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                                <div class="row mb-3">
                                    <div class="col-xl-7">
                                        <div class="mt-3">
                                            <label for="title" class="form-label">Titulo:</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"  name="title" value="{{old('title', $book->title)}}">
                                        </div>
                                    </div>
                                    @error('title')
                                        <span class="alert-validation" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                    
                                </div>
                                <div class="row mb-3">
                                    <div class="col-xl-7">
                                        <div class=" mt-3">
                                            <label for="isbn" class="form-label">ISBN:</label>
                                            <input type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" placeholder="ISBN" name="isbn" value="{{old('isbn', $book->isbn)}}">
                                        </div>
                                    </div>
                                    @error('isbn')
                                        <span class="alert-validation" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-xl-7">
                                        <div class=" mt-3">
                                            <label for="publication_year" class="form-label">Año de publicación:</label>
                                            <input type="text" class="form-control @error('publication_year') is-invalid @enderror" name="publication_year" id="datepicker" placeholder="Año de publicación:" 
                                                value="{{old('publication_year', $book->publication_year)}}"/>
                                        </div>
                                    </div>
                                    @error('publication_year')
                                        <span class="alert-validation" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <div class="col-xl-7">
                                        <div class=" mt-3">
                                            <label for="author" class="form-label">Autor:</label>
                                            <select class="form-select @error('author') is-invalid @enderror" name="author" aria-label="Default select example">
                                                @if($book->author_id)
                                                    <option >Seleccione el autor</option>
                                                    <option value="{{$book->author_id}}" selected>{{$book->user->name}}</option>
                                                    @foreach($authors as $author)
                                                        <option value="{{$author->id}}">{{$author->name}}</option>
                                                    @endforeach
                                                @else
                                                    <option selected>Seleccione el autor</option>
                                                    @foreach($authors as $author)
                                                        <option value="{{$author->id}}">{{$author->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    @error('author')
                                        <span class="alert-validation" role="alert">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                             
                                <button type="submit" class="btn btn-primary mt-5">Guardar</button>
                            </form>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>

@endsection

