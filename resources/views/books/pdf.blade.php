<!DOCTYPE html>
<html>
<head>
    <title>Libros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>Libros</h1>
    <p>{{ $date }}</p>
    
  
    <table class="table table-bordered">
        <tr>
            <th>Titulo</th>
            <th>Autor</th>
            <th>ISBN</th>
            <th>Año de publicación:</th>
        </tr>
        @foreach($books as $book)
            <tr>
                <td>{{$book->title}}</td>
                <td>{{$book->user->name}}</td>
                <td>{{$book->isbn}}</td>
                <td>{{$book->publication_year}}</td>
            </tr>
        @endforeach
    </table>
  
</body>
</html>